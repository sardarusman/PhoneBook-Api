<?php


Route::group(['prefix'=>'api','middleware'=>'customapi'], function () {

    Route::get('contact', 'ApiController@index');

    Route::get('contact/{id}', 'ApiController@show');

    Route::post('contact/add', 'ApiController@store');

    Route::get('contact/edit/{id}', 'ApiController@edit');

    Route::post('contact/edit/{id}', 'ApiController@update');

    Route::get('contact/delete/{id}', 'ApiController@destroy');
});
