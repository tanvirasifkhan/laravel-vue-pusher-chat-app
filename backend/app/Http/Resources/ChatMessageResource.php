<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatMessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            "sender"=> new UserResource($this->sender),
            "receiver"=> new UserResource($this->receiver),
            "message"=> $this->message,
            "datetime"=> date_format(date_create($this->created_at), 'd M, Y h:s A')
        ];
    }
}
