<?php
session_start();

if (!isset($_SESSION['id_residente'])) {
    die(" No hay residente seleccionado");
}

$id_residente = $_SESSION['id_residente'];

$conexion = new mysqli("localhost", "root", "", "raizdigital");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

//  AHORA USAMOS ACTIVIDADES
$sql = "SELECT * FROM actividades 
        WHERE id_residente = '$id_residente'
        ORDER BY fecha ASC, hora ASC";

$result = $conexion->query($sql);

//  DEBUG POR SI ALGO FALLA
if (!$result) {
    die("Error en query: " . $conexion->error);
}
include("views/gestion_view_enfermero.php");
?>