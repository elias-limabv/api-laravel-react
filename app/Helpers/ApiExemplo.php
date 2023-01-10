<?php

use Illuminate\Support\Facades\Http;

class ApiExemplo
{
    private $api;
    public function __contruct()
    {
        $this->api = Http::withHeaders([
            'Authorization' => 'Bearer',
        ]);
    }

    /**
     * @return \Illuminate\Http\Client\PendingRequest
     */
    public function getApi()
    {
        return $this->api;
    }
}
