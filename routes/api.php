<?php

Route::post('/login', 					'Api\AuthController@login');
Route::post('/login/refresh', 	'Api\AuthController@refresh');
Route::get('slides/home',				'Api\ApiSlideController@home');


Route::group(['middleware' => ['auth:api']], function (){
	
	Route::post('/logout',	'Api\AuthController@logout');

	//slide Routes
	Route::prefix('slides')->group(function(){
	  Route::get('/',								'Api\ApiSlideController@index');
	  Route::get('/{id}',						'Api\ApiSlideController@show');	  
	  Route::post('/create',				'Api\ApiSlideController@create');	  
	  Route::put('/{id}/update',		'Api\ApiSlideController@update');
	  Route::delete('/{id}/delete',	'Api\ApiSlideController@destroy');

	});

    //users Routes
	Route::prefix('users')->group(function(){	  
	  Route::get('/',											'Api\ApiUserController@index');
	  Route::get('/epsPensions',					'Api\ApiUserController@getEpsPensions');
	  Route::get('/{id}',									'Api\ApiUserController@show');
	  Route::post('/create',							'Api\ApiUserController@create');
	  Route::put('/changePassword/{id}',	'Api\ApiUserController@adminChangePassword');
	  Route::put('/update/{id}',					'Api\ApiUserController@update');
	  Route::delete('/delete/{id}',				'Api\ApiUserController@destroy');

	});

	//epses Routes
	Route::prefix('eps')->group(function(){	  
	  Route::get('/',								'Api\ApiEpsController@index');
	  Route::post('/create',				'Api\ApiEpsController@create');
	  Route::put('/update/{id}',		'Api\ApiEpsController@update');
	  Route::delete('/delete/{id}',	'Api\ApiEpsController@destroy');

	});

	//pensions Routes
	Route::prefix('pensions')->group(function(){	  
	  	Route::get('/',								'Api\ApiPensionController@index');
	  	Route::post('/create',				'Api\ApiPensionController@create');
	  	Route::put('/update/{id}',		'Api\ApiPensionController@update');
	  	Route::delete('/delete/{id}',	'Api\ApiPensionController@destroy');
	});

	//Job Routes
	Route::prefix('jobs')->group(function(){
	  Route::get('/',									'Api\ApiJobController@index');
	  Route::get('/{id}',							'Api\ApiJobController@show');	  
	  Route::post('/create',					'Api\ApiJobController@create');	  
	  Route::post('/{id}/addUsers',		'Api\ApiJobController@addUsers');	  
	  Route::put('/{id}/update',			'Api\ApiJobController@update');
	  Route::delete('/{id}/delete',		'Api\ApiJobController@destroy');

	});

	//Category Routes
	Route::prefix('categories')->group(function(){
		Route::get('/',								'Api\ApiCategoryController@index');
		Route::get('/{id}',						'Api\ApiCategoryController@show');	  
		Route::post('/create',				'Api\ApiCategoryController@create');	  
		Route::put('/{id}/update',		'Api\ApiCategoryController@update');
		Route::delete('/{id}/delete',	'Api\ApiCategoryController@destroy');
	
		});

	//Tools Routes
	Route::prefix('tools')->group(function(){
		Route::get('/',								'Api\ApiToolController@index');
		Route::get('/{id}',						'Api\ApiToolController@show');	  
		Route::post('/create',				'Api\ApiToolController@create');	  
		Route::put('/{id}/update',		'Api\ApiToolController@update');
		Route::delete('/{id}/delete',	'Api\ApiToolController@delete');
		Route::delete('/{id}/destroy',	'Api\ApiToolController@destroy');
	
		});

});

