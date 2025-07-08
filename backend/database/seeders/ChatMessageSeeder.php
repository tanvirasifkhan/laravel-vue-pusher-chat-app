<?php

namespace Database\Seeders;

use App\Models\ChatMessage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("SET foreign_key_checks=0");

        ChatMessage::truncate();

        ChatMessage::insert([
            [
                'sender_id' => 1,
                'receiver_id' => 2,
                'message' => "Hello, how are you?"
            ],
            [
                'sender_id' => 2,
                'receiver_id' => 1,
                'message' => "I'm fine, thank you! How about you?"
            ]
        ]);
    }
}
