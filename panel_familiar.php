<?php
session_start();

// conexión
$conexion = new mysqli("localhost", "root", "", "raizdigital");

// validar sesión
if (!isset($_SESSION['id_usuario'])) {
    die("No hay sesión iniciada");
}

$id_usuario = $_SESSION['id_usuario'];

// obtener id_familiar
$sql_familiar = "SELECT id_familiar FROM familiares WHERE id_usuario = '$id_usuario'";
$result_familiar = $conexion->query($sql_familiar);

if (!$result_familiar || $result_familiar->num_rows == 0) {
    die("No se encontró el familiar");
}

$familiar = $result_familiar->fetch_assoc();
$id_familiar = $familiar['id_familiar'];

// obtener residentes
$sql_residentes = "SELECT * FROM residentes WHERE id_familiar = '$id_familiar'";
$result_residentes = $conexion->query($sql_residentes);

//  convertimos a array (clave para la vista)
$residentes = [];

while ($row = $result_residentes->fetch_assoc()) {
    $residentes[] = $row;
}

// mandamos a la vista
include("views/panel_familiar_view.php");