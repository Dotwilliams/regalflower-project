<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;

use App\Http\Controllers\Frontend\IndexController;
use App\Models\User;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::middleware('admin:admin')->group(function () {
    Route::get('admin/login',[AdminController::class, 'loginForm']);
    Route::post('admin/login',[AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});


// All Admin Route ======================================================= All Admin Route
Route::get('/admin/logout',[AdminController::class, 'destroy'])->name('admin.logout');

Route::get('/admin/profile',[AdminProfileController::class, 'AdminProfile'])->name('admin.profile');

Route::get('/admin/profile/edit',[AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');

Route::post('/admin/profile/store',[AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');

Route::get('/admin/change/password',[AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');

Route::post('/update/change/password',[AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');



// User All Route ============================================================ User All Route
Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('dashboard', compact('user'));
    })->name('dashboard');
});

Route::get('/',[IndexController::class, 'index']);

Route::get('/user/logout',[IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile',[IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store',[IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password',[IndexController::class, 'UserChangePassword'])->name('change.password');
Route::post('/user/password/update',[IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');








