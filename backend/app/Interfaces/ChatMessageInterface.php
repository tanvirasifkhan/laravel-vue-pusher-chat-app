<?php 

namespace App\Interfaces;

use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface ChatMessageInterface
{
    public function get(int $userId): Collection;

    public function getReceiver(int $receiverId): User;
    
    public function store(array $chatMessageData): ChatMessage;
}