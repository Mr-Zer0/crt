<?php

Route::group([
    'middleware'=> 'web',
    'prefix'    => 'tour',
    'as'      => 'tour.',
    'namespace' => 'Modules\Tour\Http\Controllers'
    ], function()
    {
        Route::group([
            'as'        => 'code',
            'prefix'    => 'code'
            ], function ()
        {
            // base/tour/code
            Route::get('/', 'CodeController@index');
        });
    });
