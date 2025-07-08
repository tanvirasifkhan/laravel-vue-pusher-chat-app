<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChatMessageRequest;
use App\Http\Resources\ChatMessageResource;
use App\Repositories\ChatMessageRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoreChatMessageController extends Controller
{
    use ApiResponse;

    private $chatMessageRepository;

    public function __construct(ChatMessageRepository $chatMessageRepository)
    {
        $this->chatMessageRepository = $chatMessageRepository;
    }

    
    /**
     * Handle the incoming request.
     * 
     * @return JsonResponse
     */
    public function __invoke(StoreChatMessageRequest  $storeChatMessageRequest): JsonResponse
    {
        $message = $this->chatMessageRepository->store($storeChatMessageRequest->validated());

        return $this->successResponse(
            successMessage: "Chat message sent successfully.",
            statusCode: 201,
            data: new ChatMessageResource($message)
        );
    }
}
