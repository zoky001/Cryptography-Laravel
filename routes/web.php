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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

 Route::get('/','RsaController@index')->name('fome');
 Route::get('/generateKeys','RsaController@generateKeys')->name('generateKeys');
 
 Route::get('/sinkronoKriptiranje/{text}','RsaController@sinkronoKriptiranje');
 Route::get('/sinkronoKriptiranje/','RsaController@sinkronoKriptiranje')->name('sinkronoKriptiranje');
 
 

 Route::post('/sinkronoDeKriptiranje/','RsaController@sinkronoDeKriptiranje')->name('sinkronoDeKriptiranje');
 
 
 Route::get('/asinkronoKriptiranje/{text}','RsaController@asinkronoKriptiranje');
 Route::get('/asinkronoKriptiranje/','RsaController@asinkronoKriptiranje')->name('asinkronoKriptiranje');
 
 
 
  Route::post('/asinkronoDeKriptiranje','RsaController@asinkronoDeKriptiranje')->name('asinkronoDeKriptiranje');

  
    Route::post('/sazetak','RsaController@sazetak')->name('sazetak');

    
    
        Route::post('/potpisi','RsaController@potpisi')->name('potpisi');

                Route::post('/provjeri','RsaController@provjeri')->name('provjeri');

 
/*
Route::post('/user/{user}/changePassword','AdminController@changeUserPassword')->name('changeUserPassword');
 *  */