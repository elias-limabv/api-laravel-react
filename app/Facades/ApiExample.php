<?php

namespace App\Facades;

use Illuminate\Support\Facades;

class ApiExemplo extends Facade
{
    private $api;
    protected static function getFacadeAcessor()
    {
        return 'api-example';
    }
}