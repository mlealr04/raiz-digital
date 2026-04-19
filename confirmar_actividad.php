<?php
session_start();

$conexion = new mysqli("localhost", "root", "", "raizdigital");

$id = $_GET['id'];
$estado = $_GET['estado'];

// actualizar estado
$sql = "UPDATE actividades 
        SET estado = '$estado' 
        WHERE id_actividad = '$id'";

$conexion->query($sql);

// DETECTAR ROL
$rol = $_SESSION['rol'] ?? null;

if ($rol == "enfermero") {
    header("Location: /raiz-digital/gestion_familiar.php");
} else if ($rol == "familiar") {
    header("Location: /raiz-digital/gestion_familiar_familiar.php");
} else {
    echo "Rol no válido";
}

exit();
?>