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
    return view('welcome'); /* This is the landing page */
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); /*name('home') is the alias bad form to make the same */
Route::get('/about', 'HomeController@aboutindex')->name('about'); /*aboutindex is the name of the fcn in in the HomeController.php file */
Route::get('/statsINLINE', 'HomeController@statsINLINEindex')->name('statsINLINE');
Route::get('/statsOUTSIDE', 'HomeController@statsOUTSIDEindex')->name('statsOUTSIDE');
Route::get('/trafficFlow', 'HomeController@trafficFlowindex')->name('trafficFlow');
Route::get('/TFAnimation', 'HomeController@TFAnimationindex')->name('TFAnimation');
