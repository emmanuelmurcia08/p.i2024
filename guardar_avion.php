<?php
// Incluir archivo de conexión a la base de datos
include 'login.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nombre = $_POST['nombre'];
    $modelo = $_POST['modelo'];
    $capacidad = $_POST['capacidad'];

    // Preparar y ejecutar la consulta SQL para insertar los datos en la tabla aviones
    $sql = "INSERT INTO aviones (nombre, modelo, capacidad) VALUES ('$nombre', '$modelo', '$capacidad')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo avión agregado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar conexión a la base de datos
$conn->close();
?>

