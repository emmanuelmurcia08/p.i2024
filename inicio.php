<?php
// Conexión a la base de datos
include 'login.php'; // Incluye el archivo de conexión a la base de datos

// Verificar si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Verificar si el usuario existe
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $password_hashed=$user['contrasena'];
        // Verificar la contraseña
        if (password_verify($contrasena, $password_hashed)) {
            // Iniciar sesión y redirigir al usuario
            session_start();
            $_SESSION['correo'] = $correo;
            header("Location: roles.html");
            exit();
        } else {
            // Contraseña incorrecta
            header("Location: inicio.html?error=1");
            exit();
        }
    } else {
        // Usuario no encontrado
        header("Location: inicio.html?error=1");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
