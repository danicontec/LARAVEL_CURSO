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

- Version de Laravel 9.x
- Sistema operativo Windows 10
- Servidor [WAMP](https://www.wampserver.com/en/)
- Editor de texto de preferencia que trabaje con lenguaje PHP.

## Primeros pasos

1. Utilizando composer para crear el primer proyecto en Laravel, navegar hasta la carpeta de proyectos de **WAMP** teclear el siguiente comando:

`composer create-project laravel/laravel Laravel`

2. Abrir **WAMP** e ir hasta la carpeta public en el navegador. Alli estara la página principal por defecto del proyecto de Laravel. 

- Tener en cuenta que es un ejemplo, a medida que vaya avanzando el curso analizaré si crearé mas carpetas o trabajaré sobre la misma de Laravel añadiendo comentarios.

- Analizar bien la estructura de carpetas y sus archivos antes de que crezca para ver su estructura principal es importante.

### Problemas con rutas

- De momento al usar WAMP y cambiar las rutas de acceso el servidor de aplicaciones no responde correctamente, asi que ire usando el de la terminal de **php** bajo **linea de comandos de windows (CMD)** para arrancar el servidor de desarrollo y apreciar los cambios. Esto se puede hacer de dos maneras, si no funciona una probar la siguiente:

1. `php artisan serve` Este comando abre el puerto 8000 de **localhost**. Abrir un navegador y teclear **localhost:8000**, encontrará el index del proyecto.

2. `php -S localhost:8000 server.php` Este comando tambien abre el puerto 8000 de localhost pero buscando el archivo de php. Esto solo podría dar un problema que explico mas abajo. Si no, ira perfecto.

**Tener en cuenta que para poder visualizar lo que estamos haciendo, la terminal de Windows tiene que estar abierta y ejecutando uno de los dos comandos**.

## Advertencias

Al crear los repositorios con composer de Laravel, este crea un **git ignore** que es un archivo interno con el que trabaja la consola de comandos de **Git** para subir estos repositorios a GitHub. Por ello hay que tener en cuenta lo siguiente:

1. Si clonas este repositorio, quizas algunas funcionalidades de comandos no funcionen, ya que el archivo de **.gitignore**, prohibe la subida de la carpeta de **vendor**. Podria entrar y editar el archivo pero quiero registrar algunos problemas que pudieran surgir con un desarrollo real o al clonar archivos de otros repositorios. Esto podria pasar por ejemplo con el comando de iniciacion de server:

`php -S localhost:8000 server.php` Donde aparecerá un error que no encuentra el index. Esto se debe, analizando el codigo de la aplicación de la linea exacta a que tiene que pasar por la carpeta **vendor** y de ahi redirigir a **index.php**, pero esa carpeta al subir el repositorio no existe por la restricción de **.gitignore**

2. Al trabajar con un Framework, como en este caso siempre puede salir una pila de errores especificas que correspondan a un sistema operativo, puerto de uso o navegador donde se visualice en concreto. Estos son temas que no puedo abordar. Pero con una búsqueda rápida en Google seguro que das con la solución.

## Comandos de consola

`php artisan make:controller NombreControlador` Este comando crea en la raiz correspondiente del proyecto el controlador con el nombre asociado. Añadiendo la opcion `--resource` antes del nombre se crea un archivo mas completo