<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# LRVL-Calculadora

## Descripción

Aprovechando la estructura de [Laravel](https://laravel.com/), se lleva a cabo un ejercicio práctico en que se realiza una simple calculadora dónde se podrán efectuar 4 básicas operaciones con dos números suministrados por el usuario.

## Requisitos para la Ejecución

* Servidor web como [Apache](https://www.apachelounge.com/download/), [Nginx](http://nginx.org/en/download.html), ...
* [PHP](http://php.net/downloads.php).

## Modo de Acceso

* Una vez descargado el proyecto en local, se abre una terminal de consola desde la carpeta raíz.
* Por medio del siguiente comando de [Artisan](https://laravel.com/docs/5.7/artisan), se podrá arrancar el proyecto en el servidor:
  * `php artisan serve`

* Una vez ejecutado el comando anterior, se habrá obtenido una URL con la que acceder a la página de inicio del proyecto:
  * Laravel development server started: <http://127.0.0.1:8000>

## Modo de Uso

* Para iniciar una nueva calculadora, se accederá a la siguiente ruta:
  * http://127.0.0.1:8000/calculadora
* En la pantalla de inicio de la calculadora, el usuario deberá suministrar un nombre con el que personalizar la pantalla de cálculo.
* En la pantalla de cálculo, el usuario será saludado por el nombre que suministró.
* Tras todo esto, el usuario deberá especificar dos cifras con las que se efectuará la operación elegida para obtener el resultado deseado.

## Consideración de Errores

* El usuario deberá suministrar un nombre para llegar a la ventana de cálculo.
* Las cifras suministradas deberán ser de tipo numérico.
* Todo error será reflejado en pantalla para ponerlo en conocimiento del usuario.

## Otros

* El proyecto está estructurado con un sistema de plantillas.
