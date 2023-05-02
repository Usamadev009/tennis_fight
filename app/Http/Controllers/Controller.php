<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function sendError($error_message, $data = NULL) {
        return response()->json([
            'status' => true,
            'message' => $error_message,
            'data' => $data,
        ], 400);
    }


    public function sendSuccess($message, $data)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
        ], 200);
    }

    public function sendCreated($message, $data)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
        ], 201);
    }

    public function verifySuccess($message, $data)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
        ], 204);
    }

    public function invalidCredentials($message, $data)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
        ], 401);
    }
}
