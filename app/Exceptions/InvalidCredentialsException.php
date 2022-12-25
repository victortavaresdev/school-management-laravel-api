<?php

namespace App\Exceptions;

use Exception;

class InvalidCredentialsException extends Exception
{
    public function render()
    {
        $code = 'BAD_REQUEST';
        $message = 'Invalid credentials';
        $status = 400;

        return response([
            'code' => $code,
            'message' => $message,
            'status' => $status
        ], 400);
    }
}
