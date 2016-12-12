<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [
	'uses'=>'HomeController@index',
	'as'=> 'home',
	]);

Route::get('/home/ajax',[
		'uses' => 'HomeController@ajaxUrl',
		'as' => 'homeAjax',
		]);

Route::post('home/array',[
		'uses' => 'HomeController@arrayUrl',
		'as' => 'homeArray',
		]);	

Route::get('/dashboard', function (){
	return view('dashboard');
});

Route::get('/main',[
	'uses' => 'MainIndexController@index',
	'as' => 'main',
]);
Auth::routes();
