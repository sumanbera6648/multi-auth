<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
// namespace App\Http\Middleware\preventBackHistory
use App\Http\Controllers\UserController;

use App\Http\Controllers\StudentController;



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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin' , 'middleware'=>['isAdmin','auth','PreventBackHistory']],function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::post('/profile/update', [AdminController::class, 'profile_update'])->name('profile.update');
    Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');
});

Route::group(['prefix'=>'user' , 'middleware'=>['isUser','auth','PreventBackHistory']],function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::get('profile',[UserController::class,'profile'])->name('user.profile');
    Route::post('/profile/update', [UserController::class, 'profile_update'])->name('profile.update');
    Route::get('settings',[UserController::class,'settings'])->name('user.settings');
});


Route::get('students', [StudentController::class, 'index']);

Route::get('students/list', [StudentController::class, 'getStudents'])->name('students.list');