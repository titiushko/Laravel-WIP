<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Nuevo Comentario</title>
</head>
<body>
    <h1>Nuevo Comentario</h1>
    <p><label>Nombre:</label> {{ $comentario->nombre }}</p>
    <p><label>Correo:</label> {{ $comentario->correo }}</p>
    <p><label>Fecha:</label> {{ $comentario->fecha }}</p>
    <hr>
    <p><label>Mensaje:</label> {{ $comentario->mensaje }}</p>
</body>
</html>