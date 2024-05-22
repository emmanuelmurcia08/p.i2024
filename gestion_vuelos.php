<?php
include 'login.php';
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
input[type="time"],
input[type="number"],
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
    padding: 8px 15px;
    margin: 0 5px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    display: inline-block;
}

</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Vuelos - Administrador</title>
    <link rel="stylesheet" href="styles.css"> <!-- Estilos CSS -->
</head>
<body>
    <div class="container">
        <h2>Gestión de Vuelos - Administrador</h2>
        
        <!-- Formulario para agregar nuevo vuelo -->
        <h3>Agregar Nuevo Vuelo</h3>
        <form method="post">
            <label for="numero">Número de Vuelo:</label>
            <input type="text" name="numvuelo" required><br>
            <label for="origen">Origen:</label>
            <input type="text" name="origen" required><br>
            <label for="destino">Destino:</label>
            <input type="text" name="destino" required><br>
            <label for="hora_salida">Hora de Salida:</label>
            <input type="time" name="horasalida" required><br>
            <label for="hora_llegada">Hora de Llegada:</label>
            <input type="time" name="horallegada" required><br>
            <label for="precio">Precio:</label>
            <input type="number" name="precio" step="0.01" required><br>
            <input type="submit" name="agregar" value="Agregar Vuelo">
        </form>

        <!-- Tabla para mostrar vuelos existentes -->
        <h3>Vuelos Existentes</h3>
        <table>
            <tr>
                <th>Id</th>
                <th>Número de Vuelo</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Hora de Salida</th>
                <th>Hora de Llegada</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
            <?php
                $sql = "SELECT * FROM vuelos";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Mostrar los datos de cada fila
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["numvuelo"] . "</td>";
                        echo "<td>" . $row["origen"] . "</td>";
                        echo "<td>" . $row["destino"] . "</td>";
                        echo "<td>" . $row["horasalida"] . "</td>";
                        echo "<td>" . $row["horallegada"] . "</td>";
                        echo "<td>" . $row["precio"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No se encontraron vuelos</td></tr>";
                }
                $conn->close();
            ?>

        </table>
        <p>
        <div class="actions" align="center">
            <a href="admin.php" class="btn">Volver</a>
        </div>
        </p>
    </div>
</body>
</html>
