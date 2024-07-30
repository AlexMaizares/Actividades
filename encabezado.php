<?php
$logoUrl = 'logo.png';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página Web</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: red;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        .header img {
            height: 50px;
            vertical-align: middle;
            margin-right: 10px;
        }
        .header h1 {
            display: inline;
            vertical-align: middle;
        }
        .header a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="header">

        <h1>Mi Página Web</h1>
        <a href="usuario.php">Usuario</a>
        <a href="#">Pedido</a>
        <a href="#">Venta</a>
        <a href="cargar.php">Subir Archivo</a>
        <a href="subirimagen.php">Subir Imagen</a>
        <a href="#">Autor</a>
    </div>
    <div class="content">
        <p>Bienvenido</p>
    </div>
</body>
</html>