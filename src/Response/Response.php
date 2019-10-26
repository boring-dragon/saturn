<?php

namespace Jinas\Saturn\Response;

use Jinas\Saturn\Interfaces\IResponse;

class Response implements IResponse
{

    /**
     * json
     *
     * @param  mixed $data
     *
     * @return void
     */
    public static function json($data)
    {

        return json_encode($data, \JSON_PRETTY_PRINT);
    }
}
