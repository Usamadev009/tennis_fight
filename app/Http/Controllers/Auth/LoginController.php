<?php

namespace App\Http\Controllers\Auth;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ForgetPasswordEmail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Admin\SignInRequest;
use App\Http\Requests\Admin\ChangePasswordRequest;
use App\Http\Requests\Admin\ForgetPasswordRequest;
use Twilio\Rest\Client;
class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(SignInRequest $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                return redirect()->route('admin.dashboard');
            }
            return back()->withErrors(['email' => 'Credentials mismatch!'])->onlyInput('email');
        } catch (Exception $e) {
            session()->flash('error', 'Something Went Wrong!');
            return redirect()->route('logout');
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('login');
    }

    public function forget_password()
    {
        return view('auth.forget-password');
    }

    public function forget_password_submit(ForgetPasswordRequest $request)
    {
        try {
            $token = Str::random(64);

            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
              ]);

            Mail::to($request->email)->send(new ForgetPasswordEmail($token));
            return back()->with('message', 'We have e-mailed your password reset link!');
        } catch (\Exception $e) {
            dd("Error: ". $e->getMessage());
        }
    }

    public function reset_password($token)
    {
        return view('auth.change-password', compact('token'));
    }

    public function change_password(ChangePasswordRequest $request)
    {
        try {
            $updatePassword = DB::table('password_reset_tokens')->where('token', $request->token)->first();

            if(!$updatePassword){
                return back()->withInput()->with('error', 'Invalid token!');
            }

            $user = User::where('email', $updatePassword->email)->update(['password' => Hash::make($request->password)]);
            DB::table('password_reset_tokens')->where(['email'=> $updatePassword->email])->delete();

            return redirect()->route('login')->with('message', 'Your password has been changed!');
        } catch (\Exception $e) {
            dd("Error: ". $e->getMessage());
        }
    }
}
