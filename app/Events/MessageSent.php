<?php

namespace App\Events;
use App\User;
use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Auth;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    /**
     * User that sent the message
     *
     * @var User
     */
    public $data;


    public function __construct($data)
    {
        $this->data = $data;
        $this->dontBroadcastToCurrentUser();

     }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return new Channel('chat'.$this->notification['doctor_id']);
        return new Channel('chat'.$this->data['chat_id']);

    }


    public function broadcastAs()
       {
           return 'messageEvent';
       }
}

