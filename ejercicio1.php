<?php
if(isset($_POST['nombre'])){
    $nombre = "galleta";
    $valor = $_POST['nombre']."|".$_POST['password'];
    $fecha = time() + (60*60*24);
    setcookie($nombre, $valor, $fecha);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .formulario {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
        }
        .formulario label {
            display: block;
            margin-bottom: 10px;
            color: #fff;
        }
        .formulario input[type="text"],
        .formulario input[type="password"],
        .formulario input[type="submit"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
        }
        .formulario input[type="submit"] {
            background-color: #00FF00;
            color: black;
            cursor: pointer;
        }
        .bienvenida {
            color: #00FF00;
            background-color: #333;
            padding: 10px;
            text-align: center;
            font-weight: bold;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="formulario">
        <form action="" method="post">
            <input type="text" name="nombre" id="">
            <?php
            if(isset($_COOKIE['galeta'])){
                $datos= $_COOKIE['galleta'];
                $datos_array = explode("|", $datos);
                $usuario = $datos_array[0];
                $contrasena = $datos_array[1];
                $recordar = "on";
            }
            ?>
            <input type="password" name="password" id="" value="<?php echo ($recordar=="on")?$contrasena : '';?>">
            <input type="checkbox" name="recordar" id="" value="<?php if($recordar=="on") echo 'checked'; ?>">

            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>