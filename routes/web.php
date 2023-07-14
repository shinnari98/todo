<?php

use App\Http\Controllers\FolderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

/* Route::get('/login', [HomeController::class, 'loginForm'])->name('login');
Route::post('/login', [HomeController::class, 'login']);
Route::get('/register', [HomeController::class, 'registerForm'])->name('register');
Route::post('/register', [HomeController::class, 'register']);
Route::post('/logout', [HomeController::class, 'logout'])->name('logout'); */

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/folders/{id}/tasks', [TaskController::class, 'index'])->name('tasks.index');

    Route::get('/folders/create', [FolderController::class, 'showCreateForm'])->name('folders.create');
    Route::post('/folders/create', [FolderController::class, 'create']);

    Route::get('/folders/{id}/tasks/create', [TaskController::class, 'showCreateForm'])->name('tasks.create');
    Route::post('/folders/{id}/tasks/create', [TaskController::class, 'create']);

    Route::get('/folders/{id}/tasks/{task_id}/edit',  [TaskController::class, 'showEditForm'])->name('tasks.edit');
    Route::post('/folders/{id}/tasks/{task_id}/edit',  [TaskController::class, 'edit']);
});

Auth::routes();
Route::get('/password/forgot',[UserController::class,'showForgotForm'])->name('forgot.password.form');
Route::post('/password/forgot',[UserController::class,'SendResetLink'])->name('forgot.password.link');
Route::get('/password/reset/{token}',[UserController::class,'showResetForm'])->name('reset.password.form');
Route::post('/password/update',[UserController::class,'updateNewPassword'])->name('newPassword.update');

Route::get('/home', [HomeController::class, 'index'])->name('home');
