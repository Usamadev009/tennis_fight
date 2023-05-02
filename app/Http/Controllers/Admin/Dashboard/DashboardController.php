<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::where('role', '!=' , 'admin')->count();
        return view('admin.dashboard.dashboard',compact('users'));
    }
}
