<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/user/create', [UserController::class, 'store']);
Route::get('/user/departments', [UserController::class, 'departments']);
Route::get('/user/roles', [UserController::class, 'roles']);
Route::get('/user/activity', [UserController::class, 'activity']);
Route::get('/user/logs', [UserController::class, 'logs']);

Route::get('/task/create', [TaskController::class, 'create']);
Route::post('/task/store', [TaskController::class, 'store']);
Route::get('/task/difficulty', [TaskController::class, 'difficulty']);
Route::get('/task/priority', [TaskController::class, 'priority']);
Route::get('/task/assign', [TaskController::class, 'assign']);
Route::get('/task/status', [TaskController::class, 'status']);
