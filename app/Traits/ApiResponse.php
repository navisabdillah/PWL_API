<?php

namespace App\Traits;
trait ApiResponse
{
    Protected function apiSuccess($data, $code = 200, $message = null)
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
        ], $code);
    }

    Protected function apiError($errors, $code, $message = null)
    {
        return response()->json([
            'errors' => $errors,
            'message' => $message,
        ], $code);
    }
}