<?php
require("includes/conexion.php"); // Incluye el archivo de conexión

// Llama a la función conectar() para obtener la conexión
$conn = conectar();

if (isset($_FILES['archivo']['tmp_name']) && is_uploaded_file($_FILES['archivo']['tmp_name'])) {
    // Procesa el archivo CSV subido
    $archivo = fopen($_FILES['archivo']['tmp_name'], "r");

    if ($archivo === false) {
        die("Error al abrir el archivo.");
    }

    $i = 0;
    $bandera = true;
    while (!feof($archivo)) {
        $data = fgetcsv($archivo);
        if ($bandera) {
            $bandera = false;
            continue;
        }

        if ($data === false) {
            continue; // Omite filas vacías
        }

        // Usa consultas preparadas para evitar problemas de seguridad
        $stmt = $conn->prepare("INSERT INTO preguntas (descripcion, nombre, pais, asiento, estado) VALUES (?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die("Error al preparar la consulta: " . $conn->error);
        }

        $stmt->bind_param("sssss", $data[1], $data[2], $data[3], $data[4], $data[5]);

        if ($stmt->execute()) {
            echo "Insertó correctamente<br>";
        } else {
            echo "Error al insertar: " . $stmt->error . "<br>";
        }
        $i++;
    }
    fclose($archivo);
    $stmt->close();
    $conn->close();
} else {
    echo "No se ha subido ningún archivo o el archivo no es válido.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar CSV</title>
</head>
<body>
    <h1>Cargar Archivo CSV</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="archivo">Seleccionar archivo CSV:</label>
        <input type="file" name="archivo" id="archivo" accept=".csv" required>
        <input type="submit" value="Subir">
    </form>
</body>
</html>
