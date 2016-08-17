# README TA Passport v0.1 #

Este readme explicara la tecnología y la configuración de start-up de la aplicación TA Passport.

### Autor ###
* JuanCarlos Gonz.
* Sidrerías Tierra Astur
* juancar1987 [at] gmail.com

### Resumen ###

* Web app mobile first con framework jquerymobile para el frontend e indexdb para el almacenamiento de datos de usuario. La finalidad
* App Version 0.1
* Jquery mobile - http://demos.jquerymobile.com/1.4.5/
* IndexDb https://rolandocaldas.com/html5/indexeddb-tu-base-de-datos-local-en-html5
* MYSQL
* PHP5
* Codeigniter 3
* Auth library https://www.formget.com/form-login-codeigniter/

## Database ##
* Tabla usuarios => Contiene datos de login, cuentas de visitas de cada centro, fecha caducidad de su pasaporte (AISLAR TABLA EN FUTURO).
* Tabla premios => Logros booleanos a true/false. PREMIOS: 3 visitas, 6 visitas, 10 visitas, 10 deluxe (Las 5 sidrerias entre las 10 visitas).

### Start Up / Configuracion ###
* Summary of set up
* Configuration
* Dependencies
* Database configuration
* How to run tests
* Deployment instructions

### Start Up / Configuracion ###
* Set enviroment in config file.
* Set css framework in config file: Foundation6 / JqueryMobile
* Set CONSTANTS: claves centros y valided en número meses.

### To Develop ###
* Gestión de perfil usuario (cambiar avatar, ampliar datos...)
* Asociar mac con email y user_id
* Activar y desactivar logros
* Control de cuenta atras de logos (te queda una visita para...)
*



### To Do ###
* Tests
* Revisión de código
* Aislamiento y refactoring
* Performance
* Cache SQL + PHP