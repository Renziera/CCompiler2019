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

/**
 * Routes untuk guest (semua orang bisa akses)
 */
Route::get('/', function () {
    return view('welcome');
});

Route::view('/kompetisi/cp', 'competition.cp');
Route::view('/kompetisi/ctf', 'competition.ctf');
Route::view('/kompetisi/ppl', 'competition.ppl');
Route::view('/kompetisi/iot', 'competition.iot');
Route::view('/kompetisi/ux', 'competition.ux');

Auth::routes();

/**
 * Routes untuk peserta
 */

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Routes untuk reviewer
 */


 /**
  * Routes untuk admin
  */