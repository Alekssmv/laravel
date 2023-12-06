<?php

namespace App\Listeners;

use App\Events\ArticleDeletedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\ArticleDeletedMail;

class SendMailOnDeletedArticle
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
    public function handle(ArticleDeletedEvent $event): void
    {
        try {
            Mail::to(config('admin.email'))->send(new ArticleDeletedMail($event->article));
        } catch (\Exception $e) {
            session()->flash('error', 'Не удалось отправить уведомление');
        }
    }
}
