<?php

namespace App\Http\Middleware;
use Closure;
use App\Helpers\ResponseCode;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class UserMiddleware {
    protected $controller;
    public function __construct(Controller $controller)
    {
        $this->controller = $controller;
    }
    public function handle($request, Closure $next)
    {
        try {
            if ( JWTAuth::getToken() && JWTAuth::parseToken()->authenticate()){
                return $next($request);
            }
            return $this->controller->sendError(
                'User not found',
                ResponseCode::NOT_FOUND);
        } catch (\Exception $e) {

            return $this->controller->sendError(
                'Unauthorized',
                ResponseCode::UNAUTHORIZED);
        }
    }

}