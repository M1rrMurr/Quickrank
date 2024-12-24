<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;

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

    public function create()
    {
        return inertia('Message/MessageCreate');
    }
    public function store(Request $request)
    {
        $attributes = $request->validate(['message' => 'required', 'receiver_id' => 'required']);

        $attributes['sender_id'] = Auth::id();

        $message = Message::create($attributes);

        event(
            new MessageSent(
                $message->load(
                    [
                        'sender' => fn($query) => $query->select('id', 'name')
                    ]
                )->toArray()
            )
        );

        return redirect('/messages/inbox');
    }
}
