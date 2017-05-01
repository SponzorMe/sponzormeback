## Sponzorme Api


### Requirements

> 1. Oracle VirtualBox or VMW compatible with Vagrant [virtualBoxLink]
> 2. Vagrant [vagrantLink]
> 3. Git. [gitLink]
> 4. Composer [composerLink]
> 5. Clone Scotch Box LAMP Environment. [Download](https://github.com/scotch-io/scotch-box)
> 6. Enter in your Vagrant VM.
```sh
vagrant ssh
```

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

### Deploy

> 1. Install and Setup Vagrant Plugin with Digital Ocean. [Instructions Here](https://github.com/devopsgroup-io/vagrant-digitalocean)

That's it!!


### Api version

2.0.0.3

[virtualBoxLink]: https://www.virtualbox.org/

[vagrantLink]: https://www.vagrantup.com/downloads.html

[gitLink]: http://git-scm.com/

[composerLink]: https://getcomposer.org/
