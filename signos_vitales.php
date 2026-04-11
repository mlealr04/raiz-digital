<?php
session_start();

if (!isset($_SESSION['id_residente']) || !isset($_SESSION['id_usuario'])) {
    echo json_encode(["error" => "No hay sesión"]);
    exit();
}

$id_residente = $_SESSION['id_residente'];
$id_usuario = $_SESSION['id_usuario'];

$conexion = new mysqli("localhost", "root", "", "raizdigital");

if ($conexion->connect_error) {
    die(json_encode(["error" => "Error de conexión"]));
}

//  INSERTAR
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $presion = $_POST['presion'];
    $temperatura = $_POST['temperatura'];
    $fc = $_POST['frecuencia_cardiaca'];
    $fr = $_POST['frecuencia_respiratoria'];
    $oxigeno = $_POST['oxigeno'];
    $glucosa = $_POST['glucosa'];
    $observaciones = $_POST['observaciones'];

    $sql = "INSERT INTO signos_vitales 
    (id_residente, id_usuario, presion, temperatura, frecuencia_cardiaca, frecuencia_respiratoria, oxigeno, glucosa, observaciones)
    VALUES 
    ('$id_residente', '$id_usuario', '$presion', '$temperatura', '$fc', '$fr', '$oxigeno', '$glucosa', '$observaciones')";

    if ($conexion->query($sql)) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["error" => $conexion->error]);
    }

    exit();
}

//  OBTENER HISTORIAL (GET)
$sql = "SELECT * FROM signos_vitales 
WHERE id_residente = '$id_residente' 
ORDER BY fecha DESC, hora DESC";

$result = $conexion->query($sql);

$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);

$conexion->close();
?>