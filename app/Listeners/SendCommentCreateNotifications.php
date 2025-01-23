<?php

declare(strict_types= 1);

namespace App\Listeners;

use App\Events\CommentCreatedEvent;
use App\Models\User;
use App\Notifications\NewCommentNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Pagination\Cursor;
use Illuminate\Queue\InteractsWithQueue;

class SendCommentCreateNotifications
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CommentCreatedEvent $event): void
    {
        foreach (User::whereNot('id', $event->comment->user_id)->cursor() as $user) {
            $user->notify(new NewCommentNotification($event->comment));
        }
    }
}
