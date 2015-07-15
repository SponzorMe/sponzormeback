## Sponzorme App


### Requerimientos

> 1. Apache Server con PHP 5.5 o superior. [xamppLink]
> 2. MySQL 5.5 o superior.
> 3. Git. [gitLink]
> 4. NodeJs [nodeLink]
> 5. Composer [composerLink]

### Instalación

Para instalar Sponzorme en su computador siga los siguientes pasos:

> 1. Get the respository
> 2. Run composer update
```sh
$ git clone https://github.com/carlosrojaso/sponzorme.git
```
> 3. Create the database with the "sponzorme" like a name
> 4. Use your database credentials at:
```sh
sponzorme/.env
sponzorme/database
```
> 4. Execute the migrations and the seeds with the command:
```sh
$ php artisan migrate
$ composer dumpautoload
$ php artisan migrate:refresh --seed
```
> 5. Set up cors library:

```sh
composer require barryvdh/laravel-cors 0.5.x@dev
```

> 6. Add the CorsServiceProvider to your config/app.php providers array:

```sh
'Barryvdh\Cors\CorsServiceProvider',

```sh
> 7. Make public the corsService provider with the following command

 php artisan vendor:publish --provider="Barryvdh\Cors\CorsServiceProvider"

### Actual Version

> 8. Execute the unit test whit the command phpunit:

2.0.0.2

[xamppLink]: https://www.apachefriends.org/es/index.html

[gitLink]: http://git-scm.com/

[nodeLink]: https://nodejs.org/

[composerLink]: https://getcomposer.org/
