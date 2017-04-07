<?php

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
Route::get('/Test','TestController@Test');
Route::group([
    'namespace'=>'Message',
    'prefix'=>'message',
    'as'=>'message.',
],function(){
    Route::get('','ListController@index')          ->name('list');
    Route::get('new','CreateController@index')     ->name('new');
    Route::post('new','CreateController@create')   ->name('new:action');
    Route::post('','CreateController@reply')       ->name('reply');
    Route::post('del','ListController@delete')        ->name('del');
});

