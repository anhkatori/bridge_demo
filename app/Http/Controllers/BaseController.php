<?php

namespace App\Http\Controllers;

use App\Traits\ApiRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class BaseController extends Controller
{
    protected $urlGameService;

    public function __construct()
    {
        $this->urlGameService = config('env.urlGameService');
    }

    /**
     * @param $result
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    public function sendResponse($result, $message = 'success', $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => $result,
        ], $code);
    }

    /**
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    public function sendError($message = 'error', $code = Response::HTTP_BAD_REQUEST): JsonResponse
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
        ], $code);
    }
}
