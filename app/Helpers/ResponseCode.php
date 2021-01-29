<?php

namespace App\Helpers;

final class ResponseCode
{

    const OK = 200;
    const BAD_REQUEST = 400;
    const UNAUTHORIZED = 401;
    const FORBIDDEN = 403;
    const NOT_FOUND = 404;
    const UNPROCESSABLE_ENTITY = 422;
    const INTERVAL_SEVER_ERROR = 500;
}
