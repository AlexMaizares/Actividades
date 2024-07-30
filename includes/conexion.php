<?php
function conectar(){
    $conn = mysqli_connect("localhost", "root", "", "prueba_1");
    if(!$conn){
        echo "Error en la conexion ".mysqli_connect_error();
    }
    echo "Conexión exitosa"."<br>";
    return $conn;
}
?>