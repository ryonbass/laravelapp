<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HelloController; //hello
use App\Http\Controllers\BoardController; //board
use App\Http\Controllers\PersonController; //person
use App\Http\Controllers\RestdataController; //restdata
use App\Http\Controllers\ArchiveController; //archive
use App\Http\Middleware\HelloMiddleware;
use App\Http\Middleware\HelloMiddleware2;
use App\Http\Middleware\Authenticate;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('welcome');
});




Route::get('hello', [HelloController::class, 'index'])
    ->middleware('auth');
// ->middleware(HelloMiddleware::class)
// ->middleware([HelloMiddleware2::class]);

Route::post('hello', [HelloController::class, 'post']);

Route::get('log', [HelloController::class, 'log'])->middleware('auth');

//RESTful
Route::get('hello/rest', [HelloController::class, 'rest'])->middleware('auth');

//session
Route::get('hello/session', [HelloController::class, 'ses_get'])->middleware('auth');
Route::post('hello/session', [HelloController::class, 'ses_put']);

//データ登録
Route::get('add', [HelloController::class, 'add'])->middleware('auth');
Route::post('add', [HelloController::class, 'create']);

//データ削除
Route::get('delete', [HelloController::class, 'delete'])->middleware('auth');
Route::post('delete', [HelloController::class, 'remove']);

//データ編集
Route::get('edit', [HelloController::class, 'edit'])->middleware('auth');
Route::post('edit', [HelloController::class, 'update']);

//マイグレーション@find
Route::get('person', [PersonController::class, 'index'])->middleware('auth');
Route::post('person', [PersonController::class, 'post']);

//マイグレーション@add
Route::get('person/add', [PersonController::class, 'add'])->middleware('auth');
Route::post('person/add', [PersonController::class, 'create']);

//マイグレーション@edit
Route::get('person/edit', [PersonController::class, 'edit'])->middleware('auth');
Route::post('person/edit', [PersonController::class, 'update']);

//マイグレーション@delete
Route::get('person/del', [PersonController::class, 'delete'])->middleware('auth');
Route::post('person/del', [PersonController::class, 'remove']);

//Board
Route::get('board', [BoardController::class, 'index'])->middleware('auth');
Route::get('board/add', [BoardController::class, 'add'])->middleware('auth');
Route::post('board/add', [BoardController::class, 'create']);

//Restdata
Route::resource('rest', RestdataController::class);

//archive
Route::get('archive', [ArchiveController::class, 'leedcode'])->middleware('auth');
Route::get('archive/add', [ArchiveController::class, 'add'])->middleware('auth');
Route::post('archive/add', [ArchiveController::class, 'create']);
