
## CRUD com Comentários e Policy e autenticação Brezee

Comandos para uso nas classes: default

1. declare(strict_types=1);
2.

## Commandos da policy e use da authorize

Use na controller: use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

sail art make:policy CommentPolicy --model=Comment

## Notificação:

sail art make:notification NewCommentNotification

## Trabalhar com Event

1.Criar o evento

sail art make:event CommentCreateEvent

na Model:
   public function __construct(
        public Comment $comment,
    ){}

2.Criar um EventListener

sail art make:listener SendCommentCreateNotifications --event=CommentCreatedEvent


 protected $dispatchesEvents = [
        'created' => CommentCreateEvent::class,
    ] ;

3.Registrar o EventListener

4.configurar o mailpint para teste:
MAIL_MAILER=smtp
MAIL_SCHEME=null
MAIL_HOST=mailpit
MAIL_PORT=1025

--inserir no docker-compose.yml
services:
  mailpit:
    image: axllent/mailpit:latest
    container_name: mailpit
    ports:
      - "8025:8025" # Interface web do Mailpit
      - "1025:1025" # Porta SMTP para envio de e-mails
    restart: unless-stopped
    environment:
      # Configurações opcionais
      MAILPIT_SMTP_BIND_ADDR: "0.0.0.0:1025" # Porta para o SMTP
      MAILPIT_HTTP_BIND_ADDR: "0.0.0.0:8025" # Porta para a interface HTTP
      MAILPIT_MESSAGE_LIMIT: "1000"         # Limite de mensagens armazenadas


## Configurar o MailPit

### Premium Partners

- **[CampeloDevPro](https://campelodevpro.com/)**



If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
