<?php
include 'login.php'; // Incluir el archivo de conexión a la base de datos

// Función para eliminar usuario
if(isset($_GET['eliminar'])){
    $id_usuario = $_GET['eliminar'];
    $sql_eliminar = "DELETE FROM usuarios WHERE id=$id_usuario";
    if ($conn->query($sql_eliminar) === TRUE) {
        echo "Usuario eliminado exitosamente";
    } else {
        echo "Error al eliminar usuario: " . $conn->error;
    }
}

// Función para agregar nuevo usuario
if(isset($_POST['agregar'])){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $sql_agregar = "INSERT INTO usuarios (nombre, correo, contrasena) VALUES ('$nombre', '$correo', '$contrasena')";
    if ($conn->query($sql_agregar) === TRUE) {
        echo '<script>alert("Usuario agregado exitosamente");</script>';
    } else {
        echo '<script>alert("Error al agregar usuario: ' . $conn->error . '");</script>';
    }
    
}
?>

<!DOCTYPE html>
<html lang="es">
    <style>
        /* Estilos generales */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    width: 80%;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2, h3 {
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

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #007bff;
    color: #fff;
}

tr:hover {
    background-color: #f2f2f2;
}

a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

.btn {
    padding: 10px 20px;
    margin: 0 10px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    display: inline-block;
}

.btn:hover {
    background-color: #0056b3;
}

.btn-editar {
            background-color: #28a745;
        }

        .btn-eliminar {
            background-color: #dc3545;
        }
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios - Administrador</title>
    <link rel="stylesheet" href="styles.css"> <!-- Estilos CSS -->
</head>
<body>
    <div class="container">
        <h2>Gestión de Usuarios - Administrador</h2>
        
        <!-- Formulario para agregar nuevo usuario -->
        <h3>Agregar Nuevo Usuario</h3>
        <form method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required><br>
            <label for="email">Email:</label>
            <input type="email" name="correo" required><br>
            <label for="password">Contraseña:</label>
            <input type="password" name="contrasena" required><br>
            <input type="submit" name="agregar" value="Agregar Usuario">
        </form>

        <!-- Tabla para mostrar usuarios existentes -->
        <h3>Usuarios Existentes</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
            <?php
            $sql = "SELECT id, nombre, correo FROM usuarios";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nombre"] . "</td>";
                    echo "<td>" . $row["correo"] . "</td>";
                    echo "<td><a href='?eliminar=" . $row["id"] . "' class='btn btn-eliminar'>Eliminar</a></td>";
                    echo "<td><a href='?editar=" . $row["id"] . "' class='btn btn-editar'>Editar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No se encontraron usuarios</td></tr>";
            }
            ?>
        </table>
    </div>
    <div class="actions" align="center">
            <a href="admin.php" class="btn">Volver</a>
    </div>

</body>
</html>
