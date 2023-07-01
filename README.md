# LARAVEL_CURSO

Curso para continuar con PHP, viendo mas especificaciones y maneras de trabajar con el Framework Laravel. El curso está realizado tomando como referencia [Píldoras Informáticas](https://www.pildorasinformaticas.es/course/laravel/). Para entender este curso es recomentable hacer primero el curso de **PHP**, y puedes tomar como referencia mi repositorio de GitHub [PHP](https://github.com/danicontec/PHP_CURSO).

## Caracteristicas

El Framework de Laravel es un intermediario entre las funciones de lenguaje PHP y las acciones a realizar. Su función simplificar los patrones de diseño y ciertas funcionalidades o tareas.

## Consideraciones

En el curso original el instructor propone como muy buena práctica montar un entorno virtualizado para solucionar problemas de compatibilidad. Estoy de acuerdo con esto, en mi caso no lo haré por las siguientes razones:

1. Dar soluciones a los problemas que pudieran surgir en los entornos de desarrollo. Buscando soluciones y explicandolas en este documento.

2. Enfrentrar problemas reales, no en todos los equipos se siguen buenas prácticas y para ello, la preparación para saber trabajar en cualquier entorno lo considero como punto a tener en cuenta.

3. Al igual que en el repositorio de PHP, tendre que adaptar ciertos aspectos del código dada la evolucion del lenguaje, con este Framework a medida que se actualice este repositorio me encontraré con nuevas formas de hacer las cosas que se reflejaran en este documento. Apoyandome tanto en el curso como en la documentación oficial se irá solventando.

4. Aunque el sitio web de Laravel propone Docker en su version mas reciente, bajare una version y usare composer como manejador de dependencias dadas las limitaciones de Docker a solo ciertos sistemas operativos.

## Entorno de Trabajo

- Version de Laravel 8.83
- Sistema operativo Windows 10
- Servidor [WAMP](https://www.wampserver.com/en/)
- Editor de texto de preferencia que trabaje con lenguaje PHP.

## Primeros pasos

1. Utilizando composer para crear el primer proyecto en Laravel, navegar hasta la carpeta de proyectos de **WAMP** teclear el siguiente comando:

`composer create-project laravel/laravel Laravel`

2. Abrir **WAMP** e ir hasta la carpeta public en el navegador. Alli estara la página principal por defecto del proyecto de Laravel. Sólo se usará este servidor para trabajar con **phpmyadmin**.

- Tener en cuenta que es un ejemplo, a medida que vaya avanzando el curso analizaré si crearé mas carpetas o trabajaré sobre la misma de Laravel añadiendo comentarios.

- Analizar bien la estructura de carpetas y sus archivos antes de que crezca para ver su estructura principal es importante.

### Ruta recomendada alternativa

1. Usar el comando `php -S localhost:8000 server.php` para ver directamente el index del proyecto.

2. En la carpeta de nuestrro proyecto, renombrar el archivo que genera composer de **.env.example** a solamente **.env**. Para evitar problemas de nombrado de archivos en windows que empiezan por un **punto**, se hara por terminal con el comando `ren .env.example .env`. Esto lo que hara será solucionar problems en el futuro copn otros comandos de `php artisan` como `php artisan key:generate`. Este ultimo comando soluciona problemas con el servidor web que interpreta nuestro código como por ejemplo **Error 500: Internal server**.

### Problemas con rutas

- De momento al usar WAMP y cambiar las rutas de acceso el servidor de aplicaciones no responde correctamente, asi que iré usando el de la terminal de **php** bajo **linea de comandos de windows (CMD)** para arrancar el servidor de desarrollo y apreciar los cambios. Esto se puede hacer de dos maneras, si no funciona una probar la siguiente:

1. `php artisan serve` Este comando abre el puerto 8000 de **localhost**. Abrir un navegador y teclear **localhost:8000**, encontrará el index del proyecto.

2. `php -S localhost:8000 server.php` Este comando también abre el puerto 8000 de localhost pero buscando el archivo de php. Esto solo podría dar un problema que explico mas abajo. Si no, ira perfecto.

**Tener en cuenta que para poder visualizar lo que estamos haciendo, la terminal de Windows tiene que estar abierta y ejecutando uno de los dos comandos**.

## Advertencias

Al crear los repositorios con composer de Laravel, este crea un **git ignore** que es un archivo interno con el que trabaja la consola de comandos de **Git** para subir estos repositorios a GitHub. Por ello hay que tener en cuenta lo siguiente:

1. Si clonas este repositorio, quizas algunas funcionalidades de comandos no funcionen, ya que el archivo de **.gitignore**, prohibe la subida de la carpeta de **vendor**. Podria entrar y editar el archivo pero quiero registrar algunos problemas que pudieran surgir con un desarrollo real o al clonar archivos de otros repositorios. Esto podria pasar por ejemplo con el comando de iniciacion de server:

`php -S localhost:8000 server.php` Donde aparecerá un error que no encuentra el index. Esto se debe, analizando el código de la aplicación de la linea exacta a que tiene que pasar por la carpeta **vendor** y de ahí redirigir a **index.php**, pero esa carpeta al subir el repositorio no existe por la restricción de **.gitignore**

Para solucionar esto, hay que abrir un **CMD** en la ruta donde este el archivo **composer** y ejecutar el comando `composer install`. Esto volvera a generar todas las librerias y dependencias del proyecto.

2. Al trabajar con un Framework, como en este caso siempre puede salir una pila de errores especificas que correspondan a un sistema operativo, puerto de uso o navegador donde se visualice en concreto. Estos son temas que no puedo abordar. Pero con una búsqueda rápida en Google seguro que das con la solución.

## Comandos de consola

`php artisan make:controller NombreControlador` Este comando crea en la raiz correspondiente del proyecto el controlador con el nombre asociado. Añadiendo la opcion `--resource` antes del nombre se crea un archivo más completo

`php artisan make:component nombreVista` Este comando crea una vista y su componente en el proyecto de Laravel.

`php artisan route:list` Imprime en consola todos los links que tiene el proyecto Laravel. Si existen llaves en el link {} es que ese link admite parametros despues de un slash /.

`php artisan migrate` Este comando se comunica con el archivo artisan del proyecto, este a su vez busca las configuraciones de la base de datos en el atrchivo **.env** y crea las tablas en una base de datis existente.

`php artisan tinker` Abre un powershell dentro del mismo terminal y sirve para hacer operaciones de laravel con bases de datos, formularios o código php y ver si no existen errores en cualquiera de los puntos con los que se trabaja. 

## Bases de datos

Para trabajar con Bases de Datos bajo el Framework de Laravel hay que tener en cuenta diversos aspectos:

1. El archivo **database.php** de la carpeta de **config** muestra solo aspectos generales de los distintos gestores de bases de datos con los que trabaja Laravel.

2. Los datos más relevantes están en el archivo oculto **.env** de la carpeta **vendor**, ahí estarán los datos como usuarios, contraseñas, puertos y codificación de caracteres.

3. A la hora de crear un proyecto, Laravel ya crea unos archivos denominados **migrations**, que se encuentran en la ruta de **Proyecto/database/migrations**, estos archivos ya son para trabajar con las tablas. Para trabajar con mas datos se crearan mas archivos de este tipo.

4. Por defecto el archivo **.env**  tiene una base de datos llamada laravel que no existe en nuestro **mysql**. Si da error al principio y no puede crear las tablas, crear la base de datos manualmente.

4. Después de ejecutar el comando de `php artisan migrate`, este va al servidor de **WAMP** ejecutado y buscará **phpmyadmin** para crear las tablas que se indicadan en los archivos de **database/migrations/\***.

5. Para crear un archivo migrations, se usara el comando de `php artisan make:migration create_nombreTabla_table --create="nombreTabla"`. El **nombreTabla** pasado como opción es el nombre de la tabla que dara en el entorno de **mySQL**, el primero es una convención de nombre que tendrá el archivo con extensión **php** para encontrar su función de manera más sencilla. Aunque no le especifiquemos una fecha por defecto pondra este dato al inicio del nombre del archivo.

6. Si las tablas que se han creado con estos comandos tienen una estructura no deseada, **y solo si son nuevas (no tienen datos)** ejecutar el comando `php artisan migrate:rollback` despues ir a los archivos modificarlos y volver a ejecutar el comando de **migrate**. 

7. Para eliminar todas las tablas creadas con Laravel, ejecutar el comando `php artisan migrate:reset`. Si estas tablas tienen datos también se borrarán.

### Errores detectados en migracion

> Los archivos generados por Laravel podrian dar conflictos cuando se mezclan con los creados manualmente, lanzando excepciones de consultas SQL. Para evitar esto, entrar dentro de estos archivos y borrar los métodos de **up** y **down**. En algunos casos al ejecutar `php artisan migrate`, el Framework trata de crear otra vez alguno de estos archivos, por eso es recomendable borrar los métodos y evitar fallos en la migración.

## Curiosidades

1. Los archivos de migration guardan en su nombre una cadena de caracteres que corresponden a la fecha de creación. Si uno de ellos que corresponde a la tabla que tenga una Foreign Key, pero esta aun no ha sido creada, saltara un error de sintaxis, al ejecutar otra vez el comando de `php artisan migrate`, ya encontrara el campo y lo creara en la tabla correspondiente, pero primero saltara un error como en los archivos de este repositorio hasta que la tabla este creada.  
