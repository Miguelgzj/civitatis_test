Proyecto creado sobre el framework laravel 5.8 con Vue.js en la parte front.

Laravel 5.8 tiene los siguientes requisitos de servidor.

PHP >= 7.1.3
OpenSSL PHP Extension
PDO PHP Extension
Mbstring PHP Extension
Tokenizer PHP Extension
XML PHP Extension
Ctype PHP Extension
JSON PHP Extension
BCMath PHP Extension

Además habrá que tener instalado npm y composer.

Para poder iniciar el proyecto hay que crear una base de datos y rellenar los datos de acceso a la misma creando un fichero
.env en la raiz del proyecto haciendo uso del archivo .env.example como referencia y modificando los siguientes valores.

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE='civitatis_test'
DB_USERNAME=userName
DB_PASSWORD=password

Después ejecutaremos los siguientes comandos:

composer install
npm install
npm run dev
php artisan migrate:install
php artisan migrate
php artisan db:seed

y con esto ya tendremos el proyecto en marcha e inicializada la base de datos.

para ejecutar los test habrá que ejecutar el siguiente comando

vendor/bin/phpunit tests