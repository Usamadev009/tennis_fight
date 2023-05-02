<?php

namespace App\Http\Controllers\Admin\User;

use CountryState;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function activeUser( )
    {
        return view('admin.users.active.index');
    }

    public function activeUserList( )
    {
        $users = User::where(['status' => 'active', 'role' => 'user'])->paginate(10);
        return response()->json($users);
    }

    public function activeUserDelete($id)
    {
        $user = User::findorfail($id);
        $user->delete();
        return response()->json([
            'message' => 'User deleted successfully!'
        ]);
    }

    public function activeUserView($id)
    {
        $user = User::findorfail($id);
        return response()->json($user);
    }

    public function activeUserSearch(Request $request)
    {
        $users = User::where(['status' => 'active', 'role' => 'user'])->get();
        if($request->activeUserSearch != ''){
            $users = User::where('fullName','LIKE','%'.$request->activeUserSearch.'%')->where(['status' => 'active', 'role' => 'user'])->get();
        }
        return response()->json([
            'users' => $users,
        ]);
    }

    public function blockedUser( )
    {
        return view('admin.users.blocked.index');
    }

    public function blockedUserList( )
    {
        $users = User::where(['status' => 'blocked', 'role' => 'user'])->paginate(10);
        return response()->json($users);
    }

    public function unblockUser($id)
    {
        $user = User::findorfail($id);
        $user->status = 'active';
        $user->update();

        return response()->json([
            'message' => 'User Unblocke successfully!'
        ]);
    }

    public function blockedUserSearch(Request $request)
    {
        $users = User::where(['status' => 'blocked', 'role' => 'user'])->get();
        if($request->blockedUserSearch != ''){
            $users = User::where('fullName','LIKE','%'.$request->blockedUserSearch.'%')->where(['status' => 'blocked', 'role' => 'user'])->get();
        }
        return response()->json([
            'users' => $users
        ]);
    }

    public function deletedUser( )
    {
        return view('admin.users.deleted.index');
    }

    public function deletedUserList( )
    {
        $users = User::onlyTrashed()->where('role','user')->paginate(10);
        return response()->json($users);
    }

    public function deletedUserSearch(Request $request)
    {
        $users = User::onlyTrashed()->where('role','user')->get();
        if($request->deletedUserSearch != ''){
            $users = User::where('fullName','LIKE','%'.$request->deletedUserSearch.'%')->orwhere('deleted_at','LIKE','%'.$request->deletedUserSearch.'%')->onlyTrashed()->where('role','user')->get();
        }
        return response()->json([
            'users' => $users
        ]);
    }

    public function userProfile()
    {
        return view('admin.users.user-profile.index');
    }

    public function adminData()
    {
        $user = Auth::user();
        $countries = CountryState::getCountries();
        return response()->json([
            'user' => $user,
            'countries' => $countries,
        ]);
    }


    public function getStates($name)
    {
        $countries = CountryState::getCountries();
        $key = $this->getKeyByValue($countries,$name);
        $states = CountryState::getStates($key);
        return response()->json([
            'states' => $states
        ]);
    }

    public function getKeyByValue(array $array, $value) {
        foreach ($array as $key => $val) {
          if ($val === $value) {
            return $key;
          }
        }
        return null;
    }

    public function manageAdministration()
    {
        return view('admin.users.manage-administration.index');
    }
}
