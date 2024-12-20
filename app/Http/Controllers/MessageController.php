<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function indexInbox()
    {

        return inertia('Message/InboxIndex', [
            'messages' => Auth::user()->receivedMessages()->with(['sender' => fn($query) => $query->select('id', 'name')])->get()
        ]);
    }
    public function indexSent()
    {

        return inertia('Message/SentIndex', ['messages' => Auth::user()->sentMessages()->with(['receiver' => fn($query) => $query->select('id', 'name')])->get()]);
    }
}
