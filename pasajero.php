<?php
include 'login.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasajero</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-image: url('proyecto_integrador/seguridad_aeropuerto.jpg'); /* Cambia 'ruta/a/tu/imagen.jpg' por la URL de tu imagen */
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
</head>
<body>
    <div class="container">
        <h2>Bienvenido Pasajero</h2>
        <div class="actions">
            <a href="ver_vuelos.php" class="btn-3d">Vuelos</a>
            <a href="editar_user.php" class="btn-3d">Editar Usuario</a>
        </div>
    </div>
    <div class="actions" align="center">
            <a href="roles.html" class="btn-3d">Volver</a>
    </div>
</body>
</html>
