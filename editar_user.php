<!DOCTYPE html>
<html lang="es">
<style>
    /* Estilos generales */
    body {
            font-family: Arial, sans-serif;
            background-image: url('proyecto_integrador/user.png'); /* Cambia 'ruta/a/tu/imagen.jpg' por la URL de tu imagen */
            background-size: cover; /* Asegura que la imagen cubra toda la pantalla */
            background-repeat: no-repeat; /* Evita que la imagen se repita */
            background-attachment: fixed; /* Fija la imagen de fondo */
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.8); /* Fondo blanco con opacidad para que el texto sea legible */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

h2 {
    margin-bottom: 20px;
    text-align: center;
}

form {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
input[type="password"],
input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

.iniciar-link {
    text-align: center;
    margin-top: 20px;
}

.iniciar-link a {
    color: #007bff;
    text-decoration: none;
}

.iniciar-link a:hover {
    text-decoration: underline;
}
.btn-3d {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 0 5px #0056b3, 0 10px #00408a; /* Sombra para dar efecto 3D */
            position: relative;
            transition: all 0.2s ease;
        }

        .btn-3d:hover {
            box-shadow: 0 3px #0056b3, 0 8px #00408a;
            top: -2px;
        }

        .btn-3d:active {
            box-shadow: 0 0 #0056b3, 0 5px #00408a;
            top: 5px;
        }

        .actions {
            text-align: center;
        }

</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="styles.css"> <!-- Enlace a la hoja de estilos CSS -->
</head>
<body>
    <div class="container">
        <h2>Editar Usuario</h2>
        <?php
        // Incluir el archivo de conexión a la base de datos
        include 'login.php';

        // Verificar si se ha enviado el formulario
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recuperar los datos del formulario
            $id = $_POST["id"];
            $nuevo_usuario = $_POST["nombre"];
            $nuevo_correo = $_POST["correo"];
            $nueva_contrasena = $_POST["contrasena"];

            // Actualizar los datos en la base de datos
            $sql = "UPDATE usuarios SET nombre='$nuevo_usuario', contrasena='$nueva_contrasena', correo='$nuevo_correo' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                echo "Los datos se han actualizado correctamente.";
            } else {
                echo "Error al actualizar los datos: " . $conn->error;
            }
        }

        // Obtener el ID del usuario de la URL
        if (isset($_GET['id'])) {
            $nombre_id = $_GET['id'];
            // Resto del código para obtener y mostrar los datos del usuario...
        } else {
            echo "No se ha proporcionado el ID del usuario.";
        }
        
        
        // Consultar la base de datos para obtener los datos del usuario con el ID proporcionado
        $query = "SELECT * FROM usuarios WHERE id";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>"> <!-- Campo oculto para enviar el ID del usuario -->
            <label for="nombre">Usuario:</label><br>
            <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre'];?>" required><br>
            <label for="correo">Correo Electrónico:</label><br>
            <input type="email" id="correo" name="correo" value="<?php echo $row['correo']; ?>" required><br>
            <label for="contrasena">Contraseña:</label><br>
            <input type="password" id="contrasena" name="contrasena" value="<?php echo $row['contrasena']; ?>" required><br>
            <input type="submit" class = "btn-3d "value="Guardar Cambios">
        </form>
        <?php
        } else {
            echo "No se encontró el usuario.";
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
        ?>
    </div>
    <div class="actions" align="center">
            <a href="pasajero.php" class="btn-3d">Volver</a>
    </div>
</body>
</html>
