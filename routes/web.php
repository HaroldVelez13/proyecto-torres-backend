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


Route::get('/home', 'HomeController@index')->name('home');


//GROUP FOR sUPER ADMINISTRADORES

Route::group(['middleware' => ['role:super_admin']], function () {   

  //job Routes
  Route::prefix('job')->group(function(){
    Route::resource('/','\App\Http\Controllers\JobController');
    Route::post('/{id}/update','\App\Http\Controllers\JobController@update');
    Route::get('/{id}/delete','\App\Http\Controllers\JobController@destroy');
    Route::get('/{id}/deleteMsg','\App\Http\Controllers\JobController@DeleteMsg');
  });

  //supply Routes
  Route::prefix('supply')->group(function(){
    Route::resource('/','\App\Http\Controllers\SupplyController');
    Route::post('/{id}/update','\App\Http\Controllers\SupplyController@update');
    Route::get('/{id}/delete','\App\Http\Controllers\SupplyController@destroy');
    Route::get('/{id}/deleteMsg','\App\Http\Controllers\SupplyController@DeleteMsg');
  });

  //unity_supply Routes
  Route::prefix('unity_supply')->group(function(){
    Route::resource('/','\App\Http\Controllers\Unity_supplyController');
    Route::post('/{id}/update','\App\Http\Controllers\Unity_supplyController@update');
    Route::get('/{id}/delete','\App\Http\Controllers\Unity_supplyController@destroy');
    Route::get('/{id}/deleteMsg','\App\Http\Controllers\Unity_supplyController@DeleteMsg');
  });

  //tool_category Routes
  Route::prefix('tool_category')->group(function(){
    Route::resource('/','\App\Http\Controllers\Tool_categoryController');
    Route::post('/{id}/update','\App\Http\Controllers\Tool_categoryController@update');
    Route::get('/{id}/delete','\App\Http\Controllers\Tool_categoryController@destroy');
    Route::get('/{id}/deleteMsg','\App\Http\Controllers\Tool_categoryController@DeleteMsg');
  });

  //tool Routes
  Route::prefix('tool')->group(function(){
    Route::resource('/', '\App\Http\Controllers\ToolController');
    Route::post('/{id}/update','\App\Http\Controllers\ToolController@update');
    Route::get('/{id}/delete','\App\Http\Controllers\ToolController@destroy');
    Route::get('/{id}/deleteMsg','\App\Http\Controllers\ToolController@DeleteMsg');
  });


});


//ep Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('ep','\App\Http\Controllers\EpController');
  Route::post('ep/{id}/update','\App\Http\Controllers\EpController@update');
  Route::get('ep/{id}/delete','\App\Http\Controllers\EpController@destroy');
  Route::get('ep/{id}/deleteMsg','\App\Http\Controllers\EpController@DeleteMsg');
});

//pension Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('pension','\App\Http\Controllers\PensionController');
  Route::post('pension/{id}/update','\App\Http\Controllers\PensionController@update');
  Route::get('pension/{id}/delete','\App\Http\Controllers\PensionController@destroy');
  Route::get('pension/{id}/deleteMsg','\App\Http\Controllers\PensionController@DeleteMsg');
});

//checkin Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('checkin','\App\Http\Controllers\CheckinController');
  Route::post('checkin/{id}/update','\App\Http\Controllers\CheckinController@update');
  Route::get('checkin/{id}/delete','\App\Http\Controllers\CheckinController@destroy');
  Route::get('checkin/{id}/deleteMsg','\App\Http\Controllers\CheckinController@DeleteMsg');
});

//reservation Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('reservation','\App\Http\Controllers\ReservationController');
  Route::post('reservation/{id}/update','\App\Http\Controllers\ReservationController@update');
  Route::get('reservation/{id}/delete','\App\Http\Controllers\ReservationController@destroy');
  Route::get('reservation/{id}/deleteMsg','\App\Http\Controllers\ReservationController@DeleteMsg');
});

//restore Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('restore','\App\Http\Controllers\RestoreController');
  Route::post('restore/{id}/update','\App\Http\Controllers\RestoreController@update');
  Route::get('restore/{id}/delete','\App\Http\Controllers\RestoreController@destroy');
  Route::get('restore/{id}/deleteMsg','\App\Http\Controllers\RestoreController@DeleteMsg');
});

//slide Routes
Route::prefix('slide')->group(function(){
  Route::resource('/','\App\Http\Controllers\SlideController');
  Route::post('/{id}/update','\App\Http\Controllers\SlideController@update');
  Route::get('/{id}/delete','\App\Http\Controllers\SlideController@destroy');
  Route::get('/{id}/deleteMsg','\App\Http\Controllers\SlideController@DeleteMsg');
});
