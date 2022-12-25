<?php

namespace App\Exceptions;

use Exception;

class ConflictException extends Exception
{
    public function render()
    {
        $code = 'CONFLICT';
        $message = 'Email already exists';
        $status = 409;

        return response([
            'code' => $code,
            'message' => $message,
            'status' => $status
        ], 409);
    }
}
