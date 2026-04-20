<?php
$conexion = new mysqli("localhost", "root", "", "raizdigital");

$nombre = $_POST['nombre'];
$cantidad = $_POST['cantidad'];
$stock = $_POST['stock_minimo'];
$consumo = $_POST['consumo_diario'];

$imagen = $_FILES['imagen']['name'];
move_uploaded_file($_FILES['imagen']['tmp_name'], "uploads/" . $imagen);

$sql = "INSERT INTO productos (nombre, cantidad, imagen, stock_minimo, consumo_diario, fecha_ultimo_update)
VALUES ('$nombre', '$cantidad', '$imagen', '$stock', '$consumo', NOW())";

$conexion->query($sql);

header("Location: inventario_enfermero.php");