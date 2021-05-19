<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\HomeController;

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
    return Redirect::to('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/search', [HomeController::class, 'filterTask']);

Route::get('/tasks', [TasksController::class, 'index'])->name('tasks');

Route::get('/tasks', [TasksController::class, 'index']);

Route::post('/tasks', [TasksController::class, 'store']);


// Route::post('/tasks', [TasksController::class, 'multipleStore']);
