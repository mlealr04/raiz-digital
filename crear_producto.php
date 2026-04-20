<?php
$conexion = new mysqli("localhost", "root", "", "raizdigital");

$nombre = $_POST['nombre'];
$cantidad = $_POST['cantidad'];

$imagen = $_FILES['imagen']['name'];
move_uploaded_file($_FILES['imagen']['tmp_name'], "uploads/" . $imagen);

$sql = "INSERT INTO productos (nombre, cantidad, imagen)
VALUES ('$nombre', '$cantidad', '$imagen')";

$conexion->query($sql);

header("Location: inventario_enfermero.php");