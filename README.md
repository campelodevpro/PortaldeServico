
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
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=example@mailpit.test
MAIL_FROM_NAME="${APP_NAME}"

--inserir no docker-compose.yml
    mailpit:
        image: axllent/mailpit:latest
        container_name: mailpit
        ports:
        - "8025:8025"
        - "1025:1025"
        networks:
            - sail

  redis:
    image: redis:alpine
    container_name: redis
    ports:
      - "6379:6379"
    networks:
      - laravel-network

## Criando a class de ValidationRequest (Refatorar Validation)

sail art make:request CommentValidationRequest



### Premium Partners

- **[CampeloDevPro](https://campelodevpro.com/)**



If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
