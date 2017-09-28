<?php

Route::group(['middleware' => 'web', 'prefix' => 'tour', 'namespace' => 'Modules\Tour\Http\Controllers'], function()
{
    Route::get('/', 'TourController@index');
});
