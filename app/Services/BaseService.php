<?php

namespace App\Services;


use Exception;

class BaseService
{
    /**
     * Handle Success Cases and responses
     *
     * @param int $statusCode
     * @param $data
     * @param int $code
     * @param string $hint
     * @return array
     */
    public function success(int $statusCode, $data = null, int $code = 1, string $hint = ''): array
    {
        return [
            'status_code' => $statusCode,
            'code' => match ($statusCode) {
                200 => 1020,
                201 => 1021,
                default => $code,
            },
            'hint' => match ($statusCode) {
                200 => 'Processed Successfully',
                201 => 'Resource created successfully',
                default => $hint,
            },
            'success' => true,
            'data' => $data,
        ];
    }

    /**
     * Handle Failed Cases and Responses
     *
     * @param int $statusCode
     * @param $errors
     * @param int $code
     * @param string $hint
     * @return array
     */
    public function failed(int $statusCode, $errors, int $code = 0, string $hint = ''): array
    {
        return [
            'status_code' => $statusCode,
            'code' => match ($statusCode) {
                401 => 1041,
                403 => 1043,
                404 => 1044,
                409 => 1049,
                422 => 1422,
                500 => 1050,
                default => $code,
            },
            'hint' => match ($statusCode) {
                401 => 'Unauthenticated',
                403 => 'Forbidden',
                404 => 'Resource not found',
                409 => 'Method Not Allowed',
                422 => 'Unprocessable Entity',
                500 => 'Server error',
                default => $hint,
            },
            'success' => false,
            'errors' => $errors,
        ];
    }

}
