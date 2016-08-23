# README TA Passport v1.5 #

Este readme explicara la tecnología y la configuración de start-up de la aplicación TA Passport.

### Autor ###
* JuanCarlos Gonz.
* Sidrerías Tierra Astur
* juancar1987 [at] gmail.com

### Resumen ###
* Web app mobile first con framework jquerymobile para el frontend e indexdb para el almacenamiento de datos de usuario. La finalidad
* App Version 1.5
* Jquery mobile - http://demos.jquerymobile.com/1.4.5/
* Foundation 6
* IndexDb https://rolandocaldas.com/html5/indexeddb-tu-base-de-datos-local-en-html5
* MYSQL
* PHP5
* Codeigniter 3
* Basic Auth library https://www.formget.com/form-login-codeigniter/

## Database ##
* Tabla usuarios => Contiene datos de login, cuentas de visitas de cada centro, fecha caducidad de su pasaporte (AISLAR TABLA EN FUTURO).
* Tabla premios => Logros booleanos a true/false. PREMIOS: 3 visitas, 6 visitas, 10 visitas, 10 deluxe (Las 5 sidrerias entre las 10 visitas).

## EDITAR / --> Para humanos
La base de datos puede ser manipulada por la siguiente URL:  http://pasaporte.tierra-astur.es/scaffolding 
Esto permite hacer un CRUD a las tablas de usuarios y premios que se pueden manejar facilmente para dar de alta, editar o borrar registros.
Se solicita contraseña para acceder. Usaremos de clave: "crivencar2016". En caso de error redirecciona a tierra-astur.es

### Start Up / Configuracion ###
* Set enviroment in config file config/config.php
* Set database group: config/database.php
* Set css framework in config file: Foundation6 / JqueryMobile
* Set CONSTANTS: claves centros y valided en fecha.
* Set Cache On/Off

### To Develop ###
* Asociar mac con email y user_id
* Tutorial https://github.com/Gild/bootstrap-tour#readme
* Cache?!
* Implementación con APP.

### To Do ###
* Tests
* Revisión de código
* Aislamiento y refactoring
* Performance
* DEPLOY SCRIPT CODEIGNITER 3 --> https://github.com/kenjis/codeigniter-deployer