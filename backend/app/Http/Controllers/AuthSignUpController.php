<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthResource;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Repositories\AuthRepository;
use App\Http\Requests\SignUpRequest;
use Illuminate\Http\JsonResponse;

class AuthSignUpController extends Controller
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
    public function __invoke(SignUpRequest $signUpRequest): JsonResponse
    {
        $credentials = $signUpRequest->validated();

        $user = $this->authRepository->signUp($credentials);

        if($user != null) {
            $token = $user->createToken("token")->plainTextToken;

            $user->token = $token;

            return $this->successResponse(
                successMessage: "Signed up successfully.",
                statusCode: 201,
                data: [
                    "users"=> $this->authRepository->getUsers(),
                    "authenticatedUser"=> new AuthResource($user)
                ]
            );
        } else {
            return $this->errorResponse(
                errorMessage: "Sign up failed.",
                statusCode: 400,
                data: null
            );
        }
    }
}
