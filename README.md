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