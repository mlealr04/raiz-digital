<?php
session_start();
// Verificar sesión de enfermero
if (!isset($_SESSION['id_usuario'])) {
    die(" No has iniciado sesión");
}

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "raizdigital");

$id_residente = $_POST['id_residente'];

// Verificar residente
$sql = "SELECT * FROM residentes WHERE id_residente = '$id_residente'";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {

    //  GUARDAR SESIÓN
    $_SESSION['id_residente'] = $id_residente;

    // REDIRIGIR AL MENÚ
    header("Location: panel_residente.php");
    exit();

} else {
    echo " El residente no existe";
}

$conexion->close();
?>