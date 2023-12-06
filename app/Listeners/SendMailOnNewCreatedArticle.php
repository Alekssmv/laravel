<?php

namespace App\Listeners;

use App\Events\ArticleCreatedEvent;
use App\Mail\NewArticleCreatedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailOnNewCreatedArticle
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
    public function handle(ArticleCreatedEvent $event): void
    {
        try {
            Mail::to(config('admin.email'))->send(new NewArticleCreatedMail($event->article));
        } catch (\Exception $e) {
            session()->flash('error', 'Не удалось отправить уведомление');
        }
    }
}
