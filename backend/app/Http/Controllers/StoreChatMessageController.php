<?php

namespace App\Http\Controllers;

use App\Events\OnChatMessageSent;
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
        if(auth()->id() != $storeChatMessageRequest->validated()['receiver_id']) {
            $message = $this->chatMessageRepository->store($storeChatMessageRequest->validated());

            broadcast(new OnChatMessageSent($message));

            return $this->successResponse(
                successMessage: "Chat message sent successfully.",
                statusCode: 201,
                data: new ChatMessageResource($message)
            );
        }else {
            return $this->errorResponse(
                errorMessage:"Sender and receiver can not be the same.",
                statusCode: 403,
                data: null
            );
        }        
    }
}
