<?php

namespace Jinas\Saturn;

use Jinas\Saturn\Response\Response;
use Jinas\Saturn\Utils\ResponseUtil;
use Jinas\Saturn\Interfaces\IAppBaseUtil;

class AppBaseUtil implements IAppBaseUtil
{

    /**
     * sendResponse
     *
     * @param  mixed $result
     * @param  mixed $message
     *
     * @return void
     */
    public function sendResponse($result, $message)
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    /**
     * sendError
     *
     * @param  mixed $error
     * @param  mixed $code
     *
     * @return void
     */
    public function sendError($error, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }
}
