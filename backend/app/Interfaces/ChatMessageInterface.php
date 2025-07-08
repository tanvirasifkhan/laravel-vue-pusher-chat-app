<?php 

namespace App\Interfaces;

use App\Models\ChatMessage;
use Illuminate\Database\Eloquent\Collection;

interface ChatMessageInterface
{
    public function get(int $senderId, int $receiverId): Collection;
    
    public function store(array $chatMessageData): ChatMessage;
}