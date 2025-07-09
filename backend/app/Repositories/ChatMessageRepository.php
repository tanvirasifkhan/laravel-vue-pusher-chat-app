<?php

namespace App\Repositories;

use App\Interfaces\ChatMessageInterface;
use App\Models\ChatMessage;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;

class ChatMessageRepository implements ChatMessageInterface
{
    /**
     * Get chat messages between two users
     *
     * @param int $userId
     * @return array
     */
    public function get(int $userId): Collection
    {
        return ChatMessage::where(function ($query) use ($userId) {
            $query->where("sender_id", auth()->id())
                ->where("receiver_id", $userId);
        })->orWhere(function ($query) use ($userId) {
            $query->where("sender_id", $userId)
                ->where("receiver_id", auth()->id());
        })->orderBy("id","asc")->with(['sender', 'receiver'])->get();
    }

    /**
     * Get the receiver user of a chat message
     * 
     * @param int $receiverId
     * @return \App\Models\User
     */
    public function getReceiver(int $receiverId): User
    {
        return User::where("id", $receiverId)->first();
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