<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'RakuhaiController@index');
Route::get('/index', 'RakuhaiController@index');

// お問合せフォーム
Route::get('/contact', 'RakuhaiController@contact')->name('contact');

Route::post('/update', 'RakuhaiController@update')->name('update');

Route::post('/confirm', 'RakuhaiController@confirm')->name('confirm');

// 完了画面
Route::get('/complete', 'RakuhaiController@thanks')->name('completed');
Route::post('/complete', 'RakuhaiController@sendForm')->name('sendForm');

//編集画面
Route::get('/edit/{id}', 'RakuhaiController@edit')->name('edit');
Route::post('/edit/{id}', 'RakuhaiController@edit')->name('edit');
//更新
Route::get('/update', 'RakuhaiController@update')->name('update');
Route::post('/update', 'RakuhaiController@update')->name('update');
//削除
Route::get('/delete/{id}', 'RakuhaiController@delete')->name('delete');
Route::post('/delete/{id}', 'RakuhaiController@delete')->name('delete');

//ログイン画面

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
