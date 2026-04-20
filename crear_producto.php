<?php
$conexion = new mysqli("localhost", "root", "", "raizdigital");

$nombre = $_POST['nombre'];
$cantidad = $_POST['cantidad'];
$tipo = $_POST['tipo'];
$imagen = $_FILES['imagen']['name'];
$esp = $_POST['especificaciones'];
move_uploaded_file($_FILES['imagen']['tmp_name'], "uploads/" . $imagen);

$sql = "INSERT INTO productos (nombre, cantidad, tipo, imagen, especificaciones)
VALUES ('$nombre', '$cantidad', '$tipo', '$imagen', '$esp')";
$conexion->query($sql);

header("Location: inventario_enfermero.php");