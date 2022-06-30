<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Frontend\IndexCrontroller;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});



//admin all route

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logout',[AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile',[AdminProfileController::class, 'adminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit',[AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store',[AdminProfileController::class, 'adminProfileStore'])->name('admin.profile.store');
Route::get('/admin/profile/change/password',[AdminProfileController::class, 'adminChangePassword'])->name('admin.change.password');
Route::post('/admin/profile/update/password',[AdminProfileController::class, 'adminUpdatePassword'])->name('update.change.password');


//user all route

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');

//Home page
Route::get('/',[IndexCrontroller::class, 'index']);
Route::get('/user/logout',[IndexCrontroller::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile',[IndexCrontroller::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store',[IndexCrontroller::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password',[IndexCrontroller::class, 'UserChangePass'])->name('change.password');
Route::post('/user/password/update',[IndexCrontroller::class, 'UserPassUpdate'])->name('user.pass.update');

// admin brand all route
Route::prefix('brand')->group(function(){
    Route::get('/view',[BrandController::class, 'BrandView'])->name('all.brand');
});