# Library

Work on the library as part of practice

## Installation

- To run this project you need to start a terminal of your choice and type 

```bash
composer install
php artisan serve
php artisan migrate

```

## Usage

To run this app you need to create .env file with this inside of it:

```laravel
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:QVgbogpEQ25Y6HtiSPq//HpZUeikReXbmAGzVJfJHEY=
APP_DEBUG=true
APP_URL=http://localhost
LOG_CHANNEL=stack
LOG_LEVEL=debug
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE= //name of your database
DB_USERNAME=root
DB_PASSWORD=
BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120
MEMCACHED_HOST=127.0.0.1
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1
MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
FILESYSTEM_DRIVER=public
```

## Contributing
Pull requests are welcome by the team. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License

- none
