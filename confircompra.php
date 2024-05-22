<?php
include "login.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar los datos del formulario de pago
    $vuelo_id = $_POST["vuelo_id"];
    $numero_tarjeta = $_POST["numero_tarjeta"];
    $cvv = $_POST["cvv"];
    $fecha_expiracion = $_POST["fecha_expiracion"];

    // Insertar los datos del pago en la base de datos
    $sql_pagos = "INSERT INTO pagos (vuelo_id, numero_tarjeta, cvv, fecha_expiracion) VALUES ('$vuelo_id', '$numero_tarjeta', '$cvv', '$fecha_expiracion')";
    if ($conn->query($sql_pagos) === TRUE) {
        echo '<script>alert("Pago realizado exitosamente");</script>';
    } else {
        echo "Error al procesar el pago: " . $conn->error;
    }
}

$vuelo_id = isset($_GET['vuelo_id']) ? $_GET['vuelo_id'] : null;

if ($vuelo_id) {
    // Obtener los detalles del vuelo seleccionado
    $sql_vuelo = "SELECT * FROM vuelos WHERE id='$vuelo_id'";
    $result = $conn->query($sql_vuelo);

    if ($result && $result->num_rows > 0) {
        $vuelo_seleccionado = $result->fetch_assoc();
    } else {
        // Manejar el caso donde no se encuentra el vuelo
        echo "Vuelo no encontrado.";
        exit();
    }
} else {
    // Manejar el caso donde no se pasa el vuelo_id
    echo "ID de vuelo no proporcionado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h2 {
            margin-top: 0;
            margin-bottom: 20px;
            color: #333;
        }

        h3 {
            margin-top: 20px;
            margin-bottom: 10px;
            color: #007bff;
        }

        p {
            margin: 0 0 10px;
            color: #666;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            border: none;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Confirmar Compra</h2>

        <h3>Detalles del Vuelo</h3>
        <p><strong>Número de Vuelo:</strong> <?php echo $vuelo_seleccionado["numvuelo"]; ?></p>
        <p><strong>Origen:</strong> <?php echo $vuelo_seleccionado["origen"]; ?></p>
        <p><strong>Destino:</strong> <?php echo $vuelo_seleccionado["destino"]; ?></p>
        <p><strong>Hora de Salida:</strong> <?php echo $vuelo_seleccionado["horasalida"]; ?></p>
        <p><strong>Hora de Llegada:</strong> <?php echo $vuelo_seleccionado["horallegada"]; ?></p>
        <p><strong>Precio:</strong> <?php echo $vuelo_seleccionado["precio"]; ?></p>

        <h3>Detalles de Pago</h3>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="vuelo_id" value="<?php echo $vuelo_seleccionado["id"]; ?>">
            <label for="numero_tarjeta">Número de Tarjeta:</label>
            <input type="text" id="numero_tarjeta" name="numero_tarjeta" required><br>
            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" required><br>
            <label for="fecha_expiracion">Fecha de Expiración:</label>
            <input type="text" id="fecha_expiracion" name="fecha_expiracion" placeholder="MM/AA" required><br>
            <input type="submit" value="Pagar">
        </form>
    </div>
    <div class="actions" align="center">
        <a href="ver_vuelos.php" class="btn-3d">Volver</a>
    </div>
</body>
</html>