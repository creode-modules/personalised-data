<?php

namespace Creode\PersonalisedData\Http\Controllers;

use Illuminate\Http\Request;
use Creode\PersonalisedData\Services\PersonalisedData;
use Creode\PersonalisedData\Events\GetPersonalisedData;

class PersonalisedDataController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $personalisedDataEvent = new GetPersonalisedData($request);

        event($personalisedDataEvent);

        return response()->json($personalisedDataEvent->data());
    }
}
