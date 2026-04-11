<?php
session_start();

echo "ID USUARIO SESSION: " . $_SESSION['id_usuario'] . "<br>";

$conexion = new mysqli("localhost", "root", "", "raizdigital");

$id_usuario = $_SESSION['id_usuario'];

$sql = "SELECT * FROM familiares WHERE id_usuario = '$id_usuario'";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $f = $result->fetch_assoc();
    echo "ID FAMILIAR: " . $f['id_familiar'];
} else {
    echo "NO EXISTE EN FAMILIARES";
}

die();

$conexion = new mysqli("localhost", "root", "", "raizdigital");

if ($_SESSION['rol'] != "familiar") {
    die("Acceso no autorizado");
}

$id_usuario = $_SESSION['id_usuario'];

//  obtener id_familiar
$sql_familiar = "SELECT id_familiar FROM familiares WHERE id_usuario = '$id_usuario'";
$result = $conexion->query($sql_familiar);

if ($result->num_rows == 0) {
    die("Este usuario no tiene familiar asignado");
}

$familiar = $result->fetch_assoc();
$id_familiar = $familiar['id_familiar'];

//  obtener residentes
$sql_residentes = "SELECT * FROM residentes WHERE id_familiar = '$id_familiar'";
$residentes = $conexion->query($sql_residentes);
?>