<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function(){

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/task/new', [TaskController::class, 'create'])->name('tasks.create');
    Route::get('/task/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::get('/task/delete', [TaskController::class, 'delete'])->name('tasks.delete');
    Route::get('/task', [TaskController::class, 'index'])->name('tasks.view');
    Route::post('/task/create_action', [TaskController::class, 'create_action'])->name('task.create_action');
    Route::post('/task/edit_action', [TaskController::class, 'edit_action'])->name('task.edit_action');
});


    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login_action'])->name('user.login_action');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'register_action'])->name('user.register_action');
    Route::post('/task/update', [TaskController::class, 'update'])->name('task.update');
