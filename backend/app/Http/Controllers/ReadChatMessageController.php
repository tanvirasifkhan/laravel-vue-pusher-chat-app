<?php

namespace App\Http\Controllers;

use App\Http\Resources\ChatMessageResource;
use App\Http\Resources\UserResource;
use App\Repositories\ChatMessageRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReadChatMessageController extends Controller
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
    public function __invoke(Request $request): JsonResponse
    {
        $messages = $this->chatMessageRepository->get($request->receiver_id);

        $receiver = $this->chatMessageRepository->getReceiver($request->receiver_id);

        return $this->successResponse(            
            successMessage: "Chat messages retrieved successfully.",
            statusCode: 200,
            data: [
                "receiver"=> new UserResource($receiver),
                "messages"=> ChatMessageResource::collection($messages),
            ]
        );
    }
}
