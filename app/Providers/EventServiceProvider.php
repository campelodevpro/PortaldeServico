<?php

declare(strict_types= 1);

namespace App\Providers;

use App\Events\CommentCreateEvent;
use App\Listeners\SendCommentCreateNotifications;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * O array de eventos que mapeia listeners.
     *
     * @var array
     */
    protected $listen = [
        CommentCreateEvent::class => [
            SendCommentCreateNotifications::class,
        ],

        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        // Exemplo de registro:
        // 'App\Events\UserRegistered' => [
        //     'App\Listeners\SendWelcomeEmail',
        // ],
    ];

    /**
     * Registra quaisquer eventos para o aplicativo.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        // Você pode adicionar registros adicionais aqui.
    }

    /**
     * Determina se a descoberta automática de eventos está habilitada.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false; // Mude para true para habilitar a descoberta automática.
    }
}
