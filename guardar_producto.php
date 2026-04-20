<?php
session_start();
include("../conexion.php");

if (!isset($_SESSION['id_enfermero'])) {
    header("Location: ../login.php");
    exit();
}

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];

$nombre_imagen = $_FILES['imagen']['name'];
$tmp = $_FILES['imagen']['tmp_name'];

$ruta = "../uploads/" . time() . "_" . $nombre_imagen;

move_uploaded_file($tmp, $ruta);

// Guardamos sin ../ en BD
$ruta_db = str_replace("../", "", $ruta);

$sql = "INSERT INTO productos (nombre, descripcion, imagen, stock_actual)
        VALUES ('$nombre', '$descripcion', '$ruta_db', '$stock')";

$conexion->query($sql);

header("Location: inventario.php");
?>