# Instrucciones de uso

Gracias por la colaboración en creacion y mejoras de nuevos modulos de este sistema. Este sistema se encuentra en produccion en un servidor donde no es posible actualizar los cambios mediante Git, se recomienda la instalacion de un servidor FTP como WinSCP (https://winscp.net/eng/downloads.php).

Esta aplicacion esta construida con el Framework PHP CakePHP en su version 4.X, gracias a las mejoras que cada dia salen en el framework, es mas facil su mantenimiento y actualizacion, se recomienda mucho leer la documentacion y apoyarse en la gran comunidad de este framework, en su mayoria, alojada en Stack Overflow, ademas de ello, esta aplicion tambien utiliza las ultimas tecnologias de Javascript, como los son las promesas, Programacion Async/Await, herramientas de optimización como GULP.js, node.js, Fetch API, JSON Structures, JWT y canvas. Cualquier otra tecnologia en pro de mejoras en este sistema siempre sera bienvenida

Este pequeño proyecto utiliza tambien tecnologias API REST externas como:
1. SendinBlue para el envio masivo de correos electronicos utilizado mediante Arreglos asociativos (Objetos en PHP), data dinamica traida con MySql y JWT para la autenticación dela API REST.

2. PdfMonkey para la generacion de Pdf dimaicos gracias a plantillas ya construidas.

Nota: Cualquier otra API REST dirigida a las mejoras en el sistema es bienvenida.

Este proyecto puede utilizar tambien el servidor Apache integrado en CakePHP Pero se recomienda trabajar en XAMPP para evitar conflictos con los plugins instalados

Plugins Instalados: 
1. Authentication Service CakePHP 
2. Authorization Services (Uso tanto para la tabla como para la entidad en cuestion de permisos)





# CakePHP Application Skeleton

![Build Status](https://github.com/cakephp/app/actions/workflows/ci.yml/badge.svg?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)
[![PHPStan](https://img.shields.io/badge/PHPStan-level%207-brightgreen.svg?style=flat-square)](https://github.com/phpstan/phpstan)

A skeleton for creating applications with [CakePHP](https://cakephp.org) 4.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

1. Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.

If Composer is installed globally, run

```bash
composer create-project --prefer-dist cakephp/app
```

In case you want to use a custom app dir name (e.g. `/myapp/`):

```bash
composer create-project --prefer-dist cakephp/app myapp
```

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

## Update

Since this skeleton is a starting point for your application and various files
would have been modified as per your needs, there isn't a way to provide
automated upgrades, so you have to do any updates manually.

## Configuration

Read and edit the environment specific `config/app_local.php` and setup the 
`'Datasources'` and any other configuration relevant for your application.
Other environment agnostic settings can be changed in `config/app.php`.

## Layout

The app skeleton uses [Milligram](https://milligram.io/) (v1.3) minimalist CSS
framework by default. You can, however, replace it with any other library or
custom styles.
