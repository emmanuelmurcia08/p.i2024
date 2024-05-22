<?php
// Conexión a la base de datos
include 'login.php'; // Incluye el archivo de conexión a la base de datos

// Verificar si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $rol = "Pasajero";

    // Encriptar la contraseña
    $password_hashed = password_hash($contrasena, PASSWORD_DEFAULT);

    // Insertar datos en la base de datos
    $sql = "INSERT INTO usuarios (nombre, correo, contrasena, rol) VALUES ('$nombre', '$correo', '$password_hashed', '$rol')";

    if ($conn->query($sql) === TRUE) {
        // Registro exitoso, mostrar mensaje y redirigir
        echo "<script>
                alert('Registro exitoso. Redirigiendo a la página de inicio de sesión...');
                window.location.href='inicio.html';
              </script>";
    } else {
        // Mostrar error si algo falla
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
