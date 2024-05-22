<?php
// Incluir archivo de conexión a la base de datos
include 'login.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nombre = $_POST['nombrepi'];
    $edad = $_POST['edadpi'];
    $experiencia = $_POST['experiencia'];

    // Preparar y ejecutar la consulta SQL para insertar los datos en la tabla pilotos
    $sql = "INSERT INTO pilotos (nombre, edad, experiencia) VALUES ('$nombre', '$edad', '$experiencia')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo piloto agregado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar conexión a la base de datos
$conn->close();
?>
