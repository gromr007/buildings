<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\{Response, JsonResponse};
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response as ResponseStatus;

/**
 * Class ApiController
 *
 * Base controller for handling API responses.
 */
class ApiController extends Controller
{
    /**
     * Generate a success JSON response.
     *
     * @param mixed $data The data to include in the response.
     * @param int $status The HTTP status code (default is 200 OK).
     * @return JsonResponse The JSON response indicating success.
     */
    protected function success(mixed $data = [], int $status = ResponseStatus::HTTP_OK): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data,
        ], $status);
    }


    /**
     * Generate a no content response.
     *
     * @return Response The response indicating no content (204 No Content).
     */
    protected function noContent(): Response
    {
        return response()->noContent();
    }


    /**
     * Generate an error JSON response.
     *
     * @param string $message The error message (default is 'An unexpected error occurred').
     * @param int $status The HTTP status code (default is 400 Bad Request).
     * @return JsonResponse The JSON response indicating an error.
     */
    protected function error(
        string $message = 'An unexpected error occurred',
        int $status = ResponseStatus::HTTP_BAD_REQUEST,
    ): JsonResponse {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $status);
    }

}
