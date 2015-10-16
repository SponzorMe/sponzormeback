<<<<<<< HEAD
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
> 5. Instale la libreria de cors: 

```sh
composer require barryvdh/laravel-cors 0.5.x@dev
```

> 6. Add the CorsServiceProvider to your config/app.php providers array:

```sh
'Barryvdh\Cors\CorsServiceProvider',

```sh
> 7. Make public the corsService provider with the following command

 php artisan vendor:publish --provider="Barryvdh\Cors\CorsServiceProvider"

### Versión Actual

2.0.0.2

[xamppLink]: https://www.apachefriends.org/es/index.html

[gitLink]: http://git-scm.com/

[nodeLink]: https://nodejs.org/

[composerLink]: https://getcomposer.org/
=======
## Sponzorme Api


### Requirements

> 1. Oracle VirtualBox or VMW compatible with Vagrant [virtualBoxLink]
> 2. Vagrant [vagrantLink]
> 3. Git. [gitLink]
> 4. Composer [composerLink]

### Set up

> 1. Clone the repository.
> 2. Put the repository in an accessible folder.
> 3. Create in your machine an accessible folder to configure the vagrant machine.
> 4. Run the following commands
```sh
composer require laravel/homestead --dev  
Windows
	vendor\bin\homestead make

Mac/Linux
  php vendor/bin/homestead make
```
> 5. Generate a ssh-key in .ssh folder called id_rsa.pub (Only windows required)
> 6. Run Vagrant up in command line
> 7. Modify the following items in homestead.yaml file:
  -folders
  -sites
  -databases
  -hostnames
  -map
> 8. Run vagrant reload
> 9. Create a hostname in your SO in order to create url go to api.sponzor.me in the host file, using the IP given in homstead.yaml
> 10. Run vagrant provision
> 11. Create and save the .env file based on enviroment_sample provided.
> 12. Run vagrant SSH and execute the following commands
```sh
  # cd sponzorme
  # composer update
	# php artisan migrate
	# php artisan migrate:refresh --seed
	# sudo composer global require phpunit/phpunit
	# composer global update
  # phpunit
```
That's it!!


### Api version

2.0.0.3

[virtualBoxLink]: https://www.virtualbox.org/

[vagrantLink]: https://www.vagrantup.com/downloads.html

[gitLink]: http://git-scm.com/

[composerLink]: https://getcomposer.org/
>>>>>>> local
