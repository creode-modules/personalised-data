<?php

namespace Creode\PersonalisedData\Events;

use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class GetPersonalisedData
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(protected Request $request, protected array $data = [])
    {
        //
    }

    /**
     * Add any data to the event.
     *
     * @param string $key
     * @param mixed $value
     */
    public function addData($key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * Gets the data from the event.
     *
     * @return array
     */
    public function data() {
        return $this->data;
    }
}
