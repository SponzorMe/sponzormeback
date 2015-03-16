## SponzorMe Platform v 1.0

###Stack

####Backend
[Sentry 2](https://github.com/cartalyst/sentry) integrated with [Laravel 4](https://github.com/laravel/laravel/tree/develop).
[LAMP](http://en.wikipedia.org/wiki/LAMP_%28software_bundle%29).

####Front
[Gulp](http://gulpjs.com/).
[Bower](http://bower.io).
[SaaS](http://sass-lang.com).
[AngularJS](https://angularjs.org/).
[Bootstrap 3.0](http://getbootstrap.com).

###Must Read

Before you start to doing anything. YOU HAVE READ THIS.

[PHP Style Guide](https://github.com/SponzorMe/php-style-guide).
[CSS Style Guide](https://github.com/SponzorMe/css-style-guide).
[JS Style Guide](https://github.com/SponzorMe/javascript-style-guide).
[SaaS Build Structure](https://github.com/SponzorMe/sass-build-structure).



### Instructions

Before you begin, make sure you have both ```git``` and ```composer``` installed on your system.

1. Clone the repo
2. Run ```php composer.phar update```
3. Set up your database configuration in ```app/config/database.php```
4. Edit ```app/config/mail.php``` to work with your mail setup.
5. Run the migrations: ```php artisan migrate```
6. Seed the Database: ```php artisan db:seed```


### Instructions Front-End

1. Install Bower

$# bower install
$# sudo npm install

2. Install Gulp

### Short install

$# sudo npm install

###Linux Version

$# sudo npm install -g gulp

$# sudo npm install --save-dev gulp

$# sudo npm install --save-dev gulp-uglify

$# sudo npm install --save-dev gulp-flatten

$# sudo npm install --save-dev gulp-filter

$# sudo npm install --save-dev gulp-minify-css

$# sudo npm install --save-dev gulp-rename

$# sudo npm install --save-dev main-bower-files

$# sudo npm install --save-dev gulp-sass

###Windows Version

npm install -g gulp

npm install --save-dev gulp

npm install --save-dev gulp-uglify

npm install --save-dev gulp-flatten

npm install --save-dev gulp-filter

npm install --save-dev gulp-minify-css

npm install --save-dev gulp-rename

npm install --save-dev main-bower-files

npm install --save-dev gulp-sass

3. Local

Para el ambiente de desarrollo local si estas usando Apache (XAMPP, WAMP, etc) puedes agregar estas lineas al final del archivo http.conf:

<pre>
#Default
&lt;VirtualHost *:80&gt;
    DocumentRoot /xampp/htdocs/
    ServerName localhost
&lt;/VirtualHost&gt;

#SponzorMe
&lt;VirtualHost *:80&gt;
    DocumentRoot /xampp/htdocs/sponzorme
    ServerName local.sponzor.me
&lt;/VirtualHost&gt;
</pre>

Para que puedas ingresar al sitio local (en tu maquina) desde el navegador usando la direccion **local.sponzor.me** estando en Windows puedes editar el archivo *'C:/Windows/System32/drivers/etc/hosts'* y en Mac en *'/private/etc/hosts'* y agregar esta linea al final:

<pre>127.0.0.1  local.sponzor.me</pre>

De ser necesario cambia *'/xammp/htdocs'* por la carpeta donde tienes guardado tus sitios web, por ejemplo en Ubuntu usualmente es *'/var/www'*.

Ahora debemos crear un Vhost para tu localhost, sino no vas a poder acceder a tus otros proyectos.

<pre>
<VirtualHost *:80>
    ServerName localhost
    DocumentRoot "/Applications/XAMPP/xamppfiles/htdocs"
    <Directory "/Applications/XAMPP/xamppfiles/htdocs">
        Options Indexes FollowSymLinks Includes execCGI
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>

#SponzorMe

<VirtualHost *:80>
    DocumentRoot "//Applications/XAMPP/xamppfiles/htdocs/sponzorme/public"
    ServerName local.sponzor.me
    <Directory "/Applications/XAMPP/xamppfiles/htdocs/sponzorme/public">
        Options Indexes FollowSymLinks Includes execCGI
        AllowOverride All
        Require all granted
    </Directory>
    ErrorLog "logs/local.sponzor.me.local-error_log"
</VirtualHost>
</pre>

Be responsable with this code and make the force be with you :)
