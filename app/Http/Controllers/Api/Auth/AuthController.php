<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\Api\SendOtpEmail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Api\Auth\SignInRequest;
use App\Http\Requests\Api\Auth\SignUpRequest;
use App\Http\Requests\Api\Auth\SendOtpRequest;
use App\Http\Requests\Api\Auth\OtpVerifiedRequest;
use App\Http\Requests\Api\Auth\PasswordResetRequest;

class AuthController extends Controller
{
    public function signup(SignUpRequest $request)
    {
        try {
            DB::beginTransaction();
            $user = new User();
            $user->fullName = $request->fullName;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->gender = $request->gender;
            $user->dob = $request->dob;
            $user->completeAddress = $request->completeAddress;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->country = $request->country;
            $user->postalCode = $request->postalCode;
            $user->phoneNumber = $request->phoneNumber;
            if ($request->file('avatar')) {
                $image = $request->file('avatar');
                $filename = Str::random(10) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/upload/user/avatar');
                $request->avatar->move($destinationPath, $filename);
                $user->avatar =  $filename;
            }
            $user->regionId = $request->regionId;
            $user->emergencyContactName = $request->emergencyContactName;
            $user->emergencyContactRelation = $request->emergencyContactRelation;
            $user->emergencyContactNumber = $request->emergencyContactNumber;
            $user->bio = $request->bio;
            $user->deviceIdentifire = $request->deviceIdentifire;
            $user->deviceName = $request->deviceName;
            $user->fcmToken = $request->fcmToken;
            $user->role = 'user';
            $user->status = 'active';
            $user->save();

            $otp = mt_rand(1000, 9999);

            if($request->send_otp == 'email') {
                $user = User::where('email', $user->email)->first();
                $user->otp = $otp;
                $user->save();

                Mail::to($user->email)->send(new SendOtpEmail($user->name, $otp));
            } else {
                $user = User::where('mobile', $user->mobile)->first();
                $user->otp = $otp;
                $user->save();

                // Mobile send otp code
            }

            $data['user'] = new UserResource($user);

            DB::commit();
            return $this->sendCreated('Successfully registered', $data);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), null);
        }
    }

    public function signin(SignInRequest $request)
    {
        try {
            DB::beginTransaction();

            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {

                $user = Auth::user();
                $user->remember_token =  $user->createToken('zeeshan')->plainTextToken;
                $user->update();

                $data['user'] = new UserResource($user);

                DB::commit();
                return $this->sendSuccess('Successfully loggedin', $data);
            }
            return $this->invalidCredentials('Invalid Credentials.', null);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), null);
        }
    }

    public function sendOtp(SendOtpRequest $request)
    {
        try {
            DB::beginTransaction();

            $otp = mt_rand(1000, 9999);

            if(!empty($request->email))
            {
                $user = User::where('email', $request->email)->first();
            }

            if(!empty($request->phoneNumber))
            {
                $user = User::where('phoneNumber', $request->phoneNumber)->first();
            }

            $user->otp = $otp;
            $user->save();

            $data['otp'] = $user->otp;

            if($request->otpType == 'SIGNUP_EMAIL_OTP') {
                Mail::to($request->email)->send(new SendOtpEmail($user->name, $otp));

                DB::commit();
                return $this->sendSuccess('Otp sent successfully', $data);
            }  elseif ($request->otpType == 'RESET_EMAIL_OTP') {
                Mail::to($request->email)->send(new SendOtpEmail($user->name, $otp));

                DB::commit();
                return $this->sendSuccess('Otp sent successfully', $data);
            } elseif ($request->otpType == 'SIGNUP_NUMBER_OTP') {
                // Mobile otp code here
                return $this->sendSuccess('Otp temporarily not sent to this no', NULL);
            } elseif ($request->otpType == 'RESET_NUMBER_OTP') {
                // Mobile otp code here
                return $this->sendSuccess('Otp temporarily not sent to this no', NULL);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), null);
        }
    }

    public function verifyOtp(OtpVerifiedRequest $request)
    {
        try {
            DB::beginTransaction();

            if($request->otpType == 'SIGNUP_EMAIL_OTP') {
                $user = User::where('email', $request->email)->where('otp', $request->otp)->first();
                $user->otp = null;
                $user->update();

                DB::commit();
                return $this->verifySuccess('Otp verified successfully', null);
            }  elseif ($request->otpType == 'RESET_EMAIL_OTP') {
                $user = User::where('email', $request->email)->where('otp', $request->otp)->first();
                $user->otp = null;
                $user->update();

                DB::commit();
                return $this->verifySuccess('Otp verified successfully', null);
            } elseif ($request->otpType == 'SIGNUP_NUMBER_OTP') {
                $user = User::where('phoneNumber', $request->phoneNumber)->where('otp', $request->otp)->first();
                $user->otp = null;
                $user->update();

                DB::commit();
                return $this->verifySuccess('Otp verified successfully', null);
            } elseif ($request->otpType == 'RESET_NUMBER_OTP') {
                $user = User::where('phoneNumber', $request->phoneNumber)->where('otp', $request->otp)->first();
                $user->otp = null;
                $user->update();

                DB::commit();
                return $this->verifySuccess('Otp verified successfully', null);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), null);
        }
    }

    public function resetPassword(PasswordResetRequest $request)
    {
        try {
            DB::beginTransaction();

            $otp = mt_rand(1000, 9999);

            if($request->send_otp == 'email') {
                $user = User::where('email', $request->email)->first();
                $user->otp = $otp;
                $user->save();

                Mail::to($request->email)->send(new SendOtpEmail($user->name, $otp));
            } else {
                $user = User::where('mobile', $request->mobile)->first();
                $user->otp = $otp;
                $user->save();

                // Mobile send otp code
            }

            $data['otp'] = $user->otp;

            DB::commit();
            return $this->sendSuccess('Otp send successfully.',$data);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), null);
        }
    }

    public function profile(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = Auth::user();

            $data['user'] = new UserResource($user);

            DB::commit();
            return $this->sendSuccess('User Found', $data);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), null);
        }
    }

    public function logout(Request $request)
    {
        try {
            DB::beginTransaction();

            $user = Auth::user();
            if ($user) {
                $user->tokens()->delete();

                DB::commit();
                return $this->verifySuccess('Logout successfully!', null);
            }
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), null);
        }
    }
}
