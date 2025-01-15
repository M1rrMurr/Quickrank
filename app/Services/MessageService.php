<?php

namespace App\Services;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageService
{
    public function open(Message $message): void
    {
        if (!$message->is_opened && $message->receiver_id === Auth::user()->id) {
            $message->update(['is_opened' => true]);
        }
    }
}
