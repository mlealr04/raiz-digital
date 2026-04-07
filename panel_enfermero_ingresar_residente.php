<?php
session_start();
// Verificar sesión de enfermero
if (!isset($_SESSION['id_usuario'])) {
    die(" No has iniciado sesión");
}

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "raizdigital");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener ID del residente
$id_residente = $_POST['id_residente'];

//  Verificar que el residente exista
$sql = "SELECT * FROM residentes WHERE id_residente = '$id_residente'";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {

    // GUARDAR SESIÓN DEL RESIDENTE
    $_SESSION['id_residente'] = $id_residente;

    echo "
    <h2> Residente seleccionado correctamente</h2>
    <a href='panel_residente.php'>
        <button>Ir al panel del residente</button>
    </a>
    ";

} else {
    echo " El residente NO existe";
}

$conexion->close();
?>