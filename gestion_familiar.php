<?php
session_start();
if (!isset($_SESSION['id_residente'])) {
    die("❌ No hay residente seleccionado");
}

$id_residente = $_SESSION['id_residente'];

// conexión
$conexion = new mysqli("localhost", "root", "", "raizdigital");

if ($conexion->connect_error) {
    die("Error conexión");
}

// traer actividades del residente
$sql = "SELECT * FROM actividades 
        WHERE id_residente = '$id_residente'
        ORDER BY fecha ASC, hora ASC";

$result = $conexion->query($sql);
?>
