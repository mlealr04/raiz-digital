
<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    echo json_encode(["error" => "No sesión"]);
    exit();
}

$id_usuario = $_SESSION['id_usuario'];

$conexion = new mysqli("localhost", "root", "", "raizdigital");

if ($conexion->connect_error) {
    echo json_encode(["error" => "Error conexión"]);
    exit();
}

// buscar residente
$sql = "SELECT id_residente FROM familiares WHERE id_usuario = '$id_usuario'";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $_SESSION['id_residente'] = $row['id_residente'];

    echo json_encode([
        "success" => true,
        "id_residente" => $row['id_residente']
    ]);
} else {
    echo json_encode(["error" => "Sin residente"]);
}

$conexion->close();
?>