<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Aviones y Pilotos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('proyecto_integrador/pilotos.jpg'); /* Cambia 'ruta/a/tu/imagen.jpg' por la URL de tu imagen */
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
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        h3 {
            margin-top: 0;
            color: #007bff;
        }
        form {
            margin-bottom: 20px;
        }
        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        form input[type="text"],
        form input[type="number"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        form button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        form button[type="submit"]:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
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
</head>
<body>
    <div class="container">
        <h2>Administración de Pilotos</h2>

        <!-- Formulario para agregar un nuevo piloto -->
        <form action="guardar_piloto.php" method="POST">
            <h3>Agregar Nuevo Piloto</h3>
            <label for="nombre_piloto">Nombre del Piloto:</label>
            <input type="text" id="nombre_piloto" name="nombrepi" required>
            <label for="edad_piloto">Edad del Piloto:</label>
            <input type="number" id="edad_piloto" name="edadpi" required>
            <label for="experiencia_piloto">Experiencia del Piloto:</label>
            <input type="text" id="experiencia_piloto" name="experiencia" required>
            <button type="submit" class ="btn-3d">Agregar Piloto</button>
        </form>

        <!-- Tabla para mostrar pilotos -->
        <h3>Pilotos Registrados</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Experiencia</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'login.php';
                // Consultar pilotos
                $sql = "SELECT * FROM pilotos";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nombre"] . "</td>";
                        echo "<td>" . $row["edad"] . "</td>";
                        echo "<td>" . $row["experiencia"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No hay pilotos registrados</td></tr>";
                }

                // Cerrar conexión a la base de datos
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <div class="actions" align="center">
            <a href="admin.php" class="btn-3d">Volver</a>
    </div>
</body>
</html>
