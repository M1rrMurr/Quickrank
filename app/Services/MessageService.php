<?php

namespace App\Services;

use App\Models\Message;

class MessageService
{
    public function open(Message $message): void
    {
        if (!$message->is_opened) {
            $message->update(['is_opened' => true]);
        }
    }
}
