<?php

declare(strict_types=1);

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

final class ResponseHelper
{
    public static function build(?array $data = null, int $status = 200, ?string $message = null): JsonResponse
    {
        $responseData['message'] = $message;

        if ($status !== 200) {
            $responseData['errors'] = $data;
        } else {
            $responseData['data'] = $data;
        }

        return response()->json($responseData, $status);
    }
}
