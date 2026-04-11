<?php
session_start();

$conexion = new mysqli("localhost", "root", "", "raizdigital");

echo "ID USUARIO SESSION: " . $_SESSION['id_usuario'] . "<br>";

$id_usuario = $_SESSION['id_usuario'];

// buscar familiar
$sql_familiar = "SELECT * FROM familiares WHERE id_usuario = '$id_usuario'";
$result_familiar = $conexion->query($sql_familiar);

if ($result_familiar->num_rows == 0) {
    echo "❌ ESTE USUARIO NO EXISTE EN FAMILIARES";
    die();
}

$familiar = $result_familiar->fetch_assoc();
$id_familiar = $familiar['id_familiar'];

echo "ID FAMILIAR: " . $id_familiar . "<br>";

// buscar residentes
$sql_residentes = "SELECT * FROM residentes WHERE id_familiar = '$id_familiar'";
$result_residentes = $conexion->query($sql_residentes);

echo "TOTAL RESIDENTES: " . $result_residentes->num_rows;
die();
?>