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

Route::view('/illegal', 'illegal');

/**
 * Routes untuk peserta
 */

Route::get('/home', 'DashboardController@index')->name('home');


/**
 * Routes untuk reviewer
 */

Route::get('/review/all', 'ReviewController@getAllReview');
Route::get('/review/reviewed', 'ReviewController@getReviewed');
Route::get('/review/unreviewed', 'ReviewController@getUnreviewed');
Route::post('/review/submit', 'ReviewController@createReview');
 
 /**
  * Routes untuk admin
  */
  
Route::get('/admin/manage', 'AdminController@manageUsers');
Route::post('/admin/approve', 'AdminController@approveReviewer');
Route::get('/admin/proposal', 'AdminController@viewProposals');