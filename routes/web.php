<?php

use Creode\PersonalisedData\Http\Controllers\PersonalisedDataController;

Route::get('ajax/get-personalised-data', PersonalisedDataController::class)
    ->middleware(['web', 'auth']);
