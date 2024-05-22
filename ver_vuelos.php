<?php
include 'login.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vuelos Disponibles</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-image: url('proyecto_integrador/tiquete.jpeg'); /* Cambia 'ruta/a/tu/imagen.jpg' por la URL de tu imagen */
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
        <h2>Vuelos Disponibles</h2>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Número de Vuelo</th>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Hora de Salida</th>
                    <th>Hora de Llegada</th>
                    <th>Precio</th>
                    <th>Acciones</th> <!-- Nueva columna para el botón "Comprar" -->
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM vuelos";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row["id"] . '</td>';
                        echo '<td>' . $row["numvuelo"] . '</td>';
                        echo '<td>' . $row["origen"] . '</td>';
                        echo '<td>' . $row["destino"] . '</td>';
                        echo '<td>' . $row["horasalida"] . '</td>';
                        echo '<td>' . $row["horallegada"] . '</td>';
                        echo '<td>' . $row["precio"] . '</td>';
                        /*echo "<td><a href='confircompra.php?vuelo_id=" . htmlspecialchars($row['id']) . "' class="btn">Comprar</a></td>";*/
                        echo '<td><a href="confircompra.php?vuelo_id=' . htmlspecialchars($row["id"]) . '" class="btn-3d">Comprar</a></td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="8">No se encontraron vuelos disponibles.</td></tr>';
                }
                ?>
            </tbody>
        </table>
        <p>
        <div class="actions" align="center">
            <a href="pasajero.php" class="btn-3d">Volver</a>
        </div>
            </p>
    </div>
</body>
</html>

<?php
$conn->close();
?>
