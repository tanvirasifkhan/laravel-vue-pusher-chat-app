<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Repositories\AuthRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReadAllUserController extends Controller
{
    use ApiResponse;

    private $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }
    
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $users = $this->authRepository->getUsers();

        return $this->successResponse(
          successMessage:"Users data fetched successfully.",
          statusCode: 200,
          data: UserResource::collection($users)
        );
    }
}
