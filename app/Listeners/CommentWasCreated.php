<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Events\CommentWasCreated as CommentEvent;

use App\Notifications\NewComment;

class CommentWasCreated implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(CommentEvent $event)
    {
        $when = now()->addSeconds(10);
        $event->comment->article->user->notify((new NewComment($event->comment))->delay($when));
    }

    /**
     *  
     */
    public function failed(CommentEvent $event, $exception)
    {
        dd($event, $exception);
    }
}
