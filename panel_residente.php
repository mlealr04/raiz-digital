<?php
session_start();

if (!isset($_SESSION['id_residente'])) {
    die(" No has seleccionado un residente");
}

echo "Residente ID: " . $_SESSION['id_residente'];

$id_residente = $_SESSION['id_residente'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel del Residente</title>
    <style>
        body {
            font-family: Arial;
            text-align: center;
            margin-top: 50px;
        }
        button {
            display: block;
            margin: 20px auto;
            padding: 15px 30px;
            font-size: 16px;
        }
    </style>
</head>
<body>

<h1>Residente seleccionado: <?php echo $id_residente; ?></h1>

<h2>Opciones</h2>

<a href="signos_vitales.html">
    <button> Signos Vitales</button>
</a>

<a href="inventario.html">
    <button> Inventario</button>
</a>

<a href="gestion_familiar.html">
    <button> Gestión Familiar</button>
</a>

</body>
</html>