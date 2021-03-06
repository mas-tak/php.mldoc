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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/docs', 'DocsController@index')->name('docs');
Route::get('/docs/{id}', 'DocsController@show')->name('docs.show');
Route::get('/docs/new', 'DocsController@regist')->name('docs.new');
Route::post('/docs/new', 'DocsController@store')->name('docs.new');
Route::get('/activity', 'ActivityController@index')->name('activity');
