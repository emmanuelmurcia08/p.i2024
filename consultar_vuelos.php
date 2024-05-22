<?php
session_start();
include 'login.php'; // Archivo que contiene la conexión a la base de datos




// Consultar los tiquetes comprados por el usuario logueado
$query = "
    SELECT 
        vuelos.numvuelo, 
        vuelos.origen, 
        vuelos.destino, 
        vuelos.horasalida, 
        vuelos.horallegada, 
        vuelos.precio, 
        pagos.fecha_compra
    FROM pagos
    JOIN vuelos ON pagos.vuelo_id = vuelos.id WHERE pagos.usuario_id = $usuarios_id
";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Tiquetes</title>
    <style>
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

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .actions {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Mis Tiquetes</h2>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Número de Vuelo</th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Hora de Salida</th>
                        <th>Hora de Llegada</th>
                        <th>Precio</th>
                        <th>Fecha de Compra</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['numvuelo']; ?></td>
                            <td><?php echo $row['origen']; ?></td>
                            <td><?php echo $row['destino']; ?></td>
                            <td><?php echo $row['horasalida']; ?></td>
                            <td><?php echo $row['horallegada']; ?></td>
                            <td><?php echo $row['precio']; ?></td>
                            <td><?php echo $row['fecha_compra']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No has comprado ningún tiquete.</p>
        <?php endif; ?>
    </div>
    <div class="actions">
        <a href="pasajero.php" class="btn">Volver</a>
    </div>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conn->close();
?>
