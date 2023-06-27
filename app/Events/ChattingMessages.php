<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ChattingMessages implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $request_service_id;
    public $user_id;
    public $user_name;
    public $message;
    public $files_urls;

    public function __construct($data)
    {
        $this->request_service_id = $data['request_service_id'];
        $this->user_id = $data['user_id'];
        $this->user_name = $data['user_name'];
        $this->message = $data['message'];
        $this->files_urls = $data['files_urls'];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['chatting'];
    }

}
