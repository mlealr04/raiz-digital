<?php
session_start();

if (!isset($_GET['id']) || !isset($_GET['estado'])) {
    die("❌ Datos incompletos");
}

$id = $_GET['id'];
$estado = $_GET['estado'];

$conexion = new mysqli("localhost", "root", "", "raizdigital");

$sql = "UPDATE actividades 
        SET estado = '$estado' 
        WHERE id_actividad = '$id'";

$conexion->query($sql);

// regresar
header("Location: views/gestion_view_enfermero.php");
exit();
?>