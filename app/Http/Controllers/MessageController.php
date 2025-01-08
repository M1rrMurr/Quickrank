<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
use Illuminate\Validation\ValidationException;

class MessageController extends Controller
{
    public function indexInbox()
    {

        return inertia('Message/InboxIndex', [
            'messages' => Auth::user()->receivedMessages()->with(['sender' => fn($query) => $query->select('id', 'name')])->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
    public function indexSent()
    {

        return inertia('Message/SentIndex', ['messages' => Auth::user()->sentMessages()->with(['receiver' => fn($query) => $query->select('id', 'name')])->paginate(10)]);
    }

    public function create()
    {
        return inertia('Message/MessageCreate');
    }
    public function store(Request $request)
    {

        $attributes = $request->validate(['message' => 'required', 'subject' => 'required', 'email' => 'required']);

        $receiver = User::query()->where('email', '=', $attributes['email'])->first();

        if (!$receiver) {
            throw ValidationException::withMessages(['Receiver cannot find by the given email']);
        }

        $attributes['receiver_id'] = $receiver->id;

        $message = Auth::user()->sentMessages()->create($attributes);

        event(new MessageSent($message->load(['sender' => fn($query) => $query->select('id', 'name')])->toArray()));

        return redirect('/messages/inbox');
    }
}
