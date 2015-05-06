## Sponzorme App


### Requerimientos

> 1. Apache Server con PHP 5.5 o superior. [xamppLink]
> 2. MySQL 5.5 o superior.
> 3. Git. [gitLink]
> 4. NodeJs [nodeLink]
> 5. Composer [composerLink]

### Instalación

Para instalar Sponzorme en su computador siga los siguientes pasos:

> 1. Clone el repositorio en su máquina. 
> 2. Corra composer update
```sh
$ git clone https://github.com/carlosrojaso/sponzorme.git
```
> 3. Cree la base de datos con el nombre sponzorme
> 4. Cambie las credenciales de su base de datos en: 
```sh
sponzorme/.env
sponzorme/database
```
> 4. Ejecute las migraciones y los seeders mediante el comando: 
```sh
$ php artisan migrate
$ composer dumpautoload
$ php artisan migrate:refresh --seed
```

### Versión Actual

2.0

[xamppLink]: https://www.apachefriends.org/es/index.html

[gitLink]: http://git-scm.com/

[nodeLink]: https://nodejs.org/

[composerLink]: https://getcomposer.org/