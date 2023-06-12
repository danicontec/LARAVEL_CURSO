<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <style>
            header{
                background-color: black;
                width: 100%;
                height: 250px;
            }

            footer{
                background-color: black;
                width: 100%;
                height: 90px;
                position: absolute;
                bottom: 0;
            }

            main{
                background-color: cyan;
                width: 300px;
                height: 300px;
            }

        </style>
    </head>
    <body>
        <header>@yield("cabecera")</header>
        <main>@yield("contenido")</main>
        <footer>@yield("footer")</footer>
    </body>
</html>