<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\PersonController;
use App\Http\Middleware\HelloMiddleware;
use App\Http\Middleware\HelloMiddleware2;

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

Route::get('hello', [HelloController::class, 'index']);
// ->middleware(HelloMiddleware::class)
// ->middleware([HelloMiddleware2::class]);

Route::post('hello', [HelloController::class, 'post']);

Route::get('log', [HelloController::class, 'log']);

//データ登録
Route::get('add', [HelloController::class, 'add']);
Route::post('add', [HelloController::class, 'create']);

//データ削除
Route::get('delete', [HelloController::class, 'delete']);
Route::post('delete', [HelloController::class, 'remove']);

//データ編集
Route::get('edit', [HelloController::class, 'edit']);
Route::post('edit', [HelloController::class, 'update']);

//マイグレーション@find
Route::get('person', [PersonController::class, 'index']);
Route::post('person', [PersonController::class, 'post']);

//マイグレーション@add
Route::get('person/add', [PersonController::class, 'add']);
Route::post('person/add', [PersonController::class, 'create']);

//マイグレーション@edit
Route::get('person/edit', [PersonController::class, 'edit']);
Route::post('person/edit', [PersonController::class, 'update']);

//マイグレーション@delete
Route::get('person/del', [PersonController::class, 'delete']);
Route::post('person/del', [PersonController::class, 'remove']);

//Board
Route::get('board', [BoardController::class, 'index']);
Route::get('board/add', [BoardController::class, 'add']);
Route::post('board/add', [BoardController::class, 'create']);
