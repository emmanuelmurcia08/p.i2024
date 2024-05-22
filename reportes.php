<?php
include 'login.php';
?>

<!DOCTYPE html>
<html lang="es">
<style>
    /* Estilos generales */
    body {
            font-family: Arial, sans-serif;
            background-image: url('proyecto_integrador/reportes1.jpg'); /* Cambia 'ruta/a/tu/imagen.jpg' por la URL de tu imagen */
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

select,
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

</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes - Administrador</title>
    <link rel="stylesheet" href="styles.css"> <!-- Estilos CSS -->
</head>
<body>
    <div class="container">
        <h2>Reportes - Administrador</h2>
        
        <!-- Formulario para generar reportes -->
        <h3>Generar Reporte</h3>
        <form method="post">
            <label for="tipo_reporte">Tipo de Reporte:</label>
            <select name="tipo_reporte" required>
                <option value="ventas">Ventas</option>
                <option value="usuarios">Usuarios</option>
                <option value="vuelos">Vuelos</option>
            </select><br>
            <input type="submit" name="generar" class="btn-3d" value="Generar Reporte">
        </form>

        <!-- Aquí se mostrarían los reportes generados -->
        <?php
        if (isset($_POST['generar'])) {
            $tipo_reporte = $_POST['tipo_reporte'];
            
            if ($tipo_reporte == 'usuarios') {
                // Obtener el número de usuarios
                $sql = "SELECT COUNT(*) as total_usuarios FROM usuarios";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo "<h3>Total de Usuarios: " . $row['total_usuarios'] . "</h3>";
                } else {
                    echo "<h3>No se encontraron usuarios.</h3>";
                }
            } elseif ($tipo_reporte == 'vuelos') {
                // Obtener el número de vuelos
                $sql = "SELECT COUNT(*) as total_vuelos FROM vuelos";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo "<h3>Total de Vuelos: " . $row['total_vuelos'] . "</h3>";
                } else {
                    echo "<h3>No se encontraron vuelos.</h3>";
                }
            }
        }
        ?>
    </div>
    <p>
        <div class="actions" align="center">
            <a href="admin.php" class="btn-3d">Volver</a>
        </div>
    </p>
</body>
</html>
