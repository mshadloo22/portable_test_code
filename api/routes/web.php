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
    //return view('welcome');
   // return view('home');
});
Auth::routes();

Route::get('/','HomeController@home')->name('home');
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/tutorsearch', 'TutorSearchController@index')->name('tutorsearch');
Route::post('/addressesExcludingInputedValue', 'TutorSearchController@getAddresses');

/* Google login */
Route::get('/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/callback', 'SocialAuthGoogleController@callback');

/* Facebook login */
Route::get('/redirect/facebook', 'SocialAuthFacebookController@redirect');
Route::get('/callback/facebook', 'SocialAuthFacebookController@callback'); 

// sample CRUDE operation for object using resources
//  Route::resources(['Question'=>'Xy_question\QuestionController']);
Route::post('/document/searchDocument','DocumentController@searchDocument');
Route::get('/document/test1','DocumentController@test1');
Route::post('/document/test1','DocumentController@test1');




