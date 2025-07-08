<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class AuthSignOutController extends Controller
{
    use ApiResponse;

    /**
     * Handle the incoming request.
     * 
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return $this->successResponse(
            successMessage: "Logged out successfully.",
            statusCode: 200,
            data: null
        );
    }
}
