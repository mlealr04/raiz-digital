<?php
session_start();

$conexion = new mysqli("localhost", "root", "", "raizdigital");

$id_usuario = $_SESSION['id_usuario'];

// obtener id_familiar
$sql_familiar = "SELECT id_familiar FROM familiares WHERE id_usuario = '$id_usuario'";
$result = $conexion->query($sql_familiar);
$id_familiar = $familiar['id_familiar'];

// obtener residentes
$sql_residentes = "SELECT * FROM residentes WHERE id_familiar = '$id_familiar'";
$residentes = $conexion->query($sql_residentes);

// mandar a la vista
include("views/panel_familiar_view.php");
?>



