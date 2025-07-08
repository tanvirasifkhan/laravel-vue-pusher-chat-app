<?php

namespace App\Repositories;

use App\Interfaces\ChatMessageInterface;
use App\Models\ChatMessage;
use Illuminate\Database\Eloquent\Collection;

class ChatMessageRepository implements ChatMessageInterface
{
    /**
     * Get chat messages between two users
     *
     * @param int $receiverId
     * @return array
     */
    public function get(int $receiverId): Collection
    {
        return ChatMessage::where("sender_id", auth()->id())
            ->where("receiver_id",  $receiverId)->get();
    }

    /**
     * Store a new chat message
     *
     * @param array $chatMessageData
     * @return \App\Models\ChatMessage
     */
    public function store(array $chatMessageData): ChatMessage
    {
        return ChatMessage::create([
            "sender_id"=> auth()->id(),
            "receiver_id"=> $chatMessageData["receiver_id"],
            "message"=> $chatMessageData["message"],
        ]);
    }
}