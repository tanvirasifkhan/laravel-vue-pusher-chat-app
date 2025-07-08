<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Repositories\AuthRepository;
use App\Http\Resources\AuthResource;
use App\Http\Requests\SignInRequest;

class AuthSignInController extends Controller
{
    use ApiResponse;

    private $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    /**
     * Handle the incoming request.
     * 
     * @return JsonResponse
     */
    public function __invoke(SignInRequest $signInRequest): JsonResponse
    {
        $credentials = $signInRequest->validated();

        if($this->authRepository->isLoggedIn($credentials)) {
            $user = $signInRequest->user();
            
            $token = $user->createToken("token")->plainTextToken;

            $user->token = $token;

            return $this->successResponse(
                successMessage:"Loggedin successfully.",
                statusCode: 200,
                data: new AuthResource($user)
            );
        }else {
            return $this->errorResponse(
                errorMessage:"Wrong credentials! Login failed.",
                statusCode: 401,
                data: null
            );
        }
    }
}
