<?php

Route::middleware('web')->group(function () {
    Route::resource('tours', 'Modules\Tour\Http\Controllers\TourController');
});
