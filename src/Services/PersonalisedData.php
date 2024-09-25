<?php

namespace Creode\PersonalisedData\Services;

use Illuminate\Support\Facades\Event;
use Creode\PersonalisedData\Events\GetPersonalisedData;

class PersonalisedData
{
    /**
     * Attach data to the personalised data event.
     *
     * @param string $key
     * @param Callable $dataRetrieval
     */
    public static function attach(string $key, Callable $dataRetrieval): void
    {
        Event::listen(GetPersonalisedData::class, function (GetPersonalisedData $event) use ($key, $dataRetrieval) {
            $event->addData($key, $dataRetrieval());
        });
    }
}
