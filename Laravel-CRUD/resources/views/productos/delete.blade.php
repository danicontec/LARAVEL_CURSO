@extends("../layouts.plantilla")
<h1>Formulario de ingreso</h1>
<form method="POST" action="envio">
    @csrf
    <input type="text" name="Nombre">

    <input type="submit" value="Enviar" name="enviar">


</form>