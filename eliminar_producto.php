<?php
session_start();
include("../conexion.php");

if (!isset($_SESSION['id_enfermero'])) {
    header("Location: ../login.php");
    exit();
}

$id = $_GET['id'];

$sql = "UPDATE productos SET activo = 0 WHERE id_producto = '$id'";
$conexion->query($sql);

header("Location: inventario.php");
?>