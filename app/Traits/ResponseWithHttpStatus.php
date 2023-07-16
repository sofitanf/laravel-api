<?php

namespace App\Traits;

trait ResponseWithHttpStatus
{
    protected function responseSuccess($message, $data = null, $code = 200)
    {
        return response()->json([
            'code' => $code,
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    protected function responseError($message = null, $data = null, $code = 401)
    {
        return response()->json([
            'code' => $code,
            'success' => false,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    protected function errorValidation($validator)
    {
        return response()->json([
            'code'  => 422,
            'success' => false,
            'data' => null,
            'message' => $validator->errors()->first()
        ], 422);
    }
}
