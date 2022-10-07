<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TurtlesController;

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

Route::get('/', [TurtlesController::class, 'index']);
Route::get('/good', [TurtlesController::class, 'good']);
Route::get('/bad', [TurtlesController::class, 'bad']);
Route::get('/restart', [TurtlesController::class, 'restart']);

