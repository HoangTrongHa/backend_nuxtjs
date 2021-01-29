<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function sendError($message, $code = null, $data = [])
    {
        $res = [
            'data'  => $data,
            'status' => [
                'code' => $code,
                'message' => $message,
                'success' => false,
            ]
        ];

        return $this->jsonResponse($res, $code);
    }
    public function sendResponse($resource = [], $message = null)
    {
        $res = [
            // 'message' => $message,
            'data' => $resource,
            'status' => [
                'code' => 200,
                'message' => $message,
                'success' => true,
            ]
        ];

        return $this->jsonResponse($res);
    }
    protected function jsonResponse($data, $status = 200)
    {
        return response()->json($data, $status);
    }
}
