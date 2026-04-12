<?php
session_start();

if (!isset($_SESSION['id_residente'])) {
    die(" No hay residente seleccionado");
}
/*
$id_residente = $_SESSION['id_residente'];

$conexion = new mysqli("localhost", "root", "", "raizdigital");

//  AQUÍ ESTÁ LA CLAVE
$sql = "SELECT * FROM gestion_familiar 
        WHERE id_residente = '$id_residente'
        ORDER BY fecha DESC";

$result = $conexion->query($sql);
*/
include("views/gestion_view.php");
?>