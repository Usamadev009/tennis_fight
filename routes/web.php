<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Notification\NotificationController;
use App\Http\Controllers\Admin\PrivacyPolicy\PrivacyPolicyController;
use App\Http\Controllers\Admin\TermsConditions\TermsConditionsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\Auth\LoginController@index')->middleware('session_auth');


Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'session_auth'], function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login');

    Route::get('forget-password', [LoginController::class, 'forget_password'])->name('forget-password');
    Route::post('forget-password', [LoginController::class, 'forget_password_submit'])->name('forget-password');

    Route::get('reset-password/{token}', [LoginController::class, 'reset_password'])->name('reset-password');
    Route::post('change-password', [LoginController::class, 'change_password'])->name('change-password');
});

Route::group(['middleware' => ['auth', 'role_auth']], function () {

    Route::get('manage-administration', [UserController::class, 'manageAdministration'])->name('manageAdministration');
    Route::get('user-profile', [UserController::class, 'userProfile'])->name('admin.userProfile');
    Route::get('admin-data', [UserController::class, 'adminData']);
    Route::post('get-states/{name}', [UserController::class, 'getStates']);

    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('notifications', [NotificationController::class, 'index'])->name('admin.notifications');

    Route::get('active-user', [UserController::class, 'activeUser'])->name('activeUser');
    Route::get('active-user/list', [UserController::class, 'activeUserList']);
    Route::post('active-user/delete/{id}', [UserController::class, 'activeUserDelete']);
    Route::get('active-user/search', [UserController::class, 'activeUserSearch']);

    Route::get('blocked-user', [UserController::class, 'blockedUser'])->name('blockedUser');
    Route::post('blocked-user/unblock/{id}', [UserController::class, 'unblockUser']);
    Route::get('blocked-user/list', [UserController::class, 'blockedUserList']);
    Route::get('blocked-user/search', [UserController::class, 'blockedUserSearch']);

    Route::get('deleted-user', [UserController::class, 'deletedUser'])->name('deletedUser');
    Route::get('deleted-user/list', [UserController::class, 'deletedUserList']);
    Route::get('deleted-user/search',[UserController::class, 'deletedUserSearch']);

    Route::get('terms-condition',[TermsConditionsController::class, 'index'])->name('admin.termsConditions');
    Route::post('terms-condition/edit/{id}',[TermsConditionsController::class, 'edit']);
    Route::post('terms-condition/update/{id}',[TermsConditionsController::class, 'update']);

    Route::get('privacy-policy',[PrivacyPolicyController::class, 'index'])->name('admin.privacyPolicy');
    Route::post('privacy-policy/edit/{id}',[PrivacyPolicyController::class, 'edit']);
    Route::post('privacy-policy/update/{id}',[PrivacyPolicyController::class, 'update']);

});

