<?php

namespace App\Listeners;

use App\Events\ArticleUpdatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\ArticleUpdatedMail;

class SendMailOnUpdatedArticle
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
    public function handle(ArticleUpdatedEvent $event): void
    {
    try {
        Mail::to(config('admin.email'))->send(new ArticleUpdatedMail($event->article));
    } catch (\Exception $e) {
        session()->flash('error', 'Не удалось отправить уведомление');
    }
    }
}
