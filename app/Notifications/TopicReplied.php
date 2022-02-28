<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\Models\Reply;

class TopicReplied extends Notification
{
    use Queueable;

    /**
     * Store an instance of Reply
     *
     * @var Reply
     */
    protected $reply;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Reply $reply)
    {
        $this->reply = $reply;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        $user = $this->reply->user;
        $topic = $this->reply->topic;
        return [
            'user_id'     => $user->id,
            'user_name'   => $user->name,
            'user_avatar' => $user->avatar,
            'topic_id'    => $topic->id,
            'topic_title' => $topic->title,
            'topic_link'  => $topic->link(['#reply', $this->reply->id]),
            'content'     => $this->reply->content,
        ];
    }
}
