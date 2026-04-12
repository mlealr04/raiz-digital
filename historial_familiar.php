<?php
session_start();

if (!isset($_SESSION['id_residente'])) {
    echo json_encode([]);
    exit();
}

echo "ID RESIDENTE: " . $_SESSION['id_residente'];
die();

$conexion = new mysqli("localhost", "root", "", "raizdigital");

$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : date('Y-m-d');

$id_residente = $_SESSION['id_residente']
$sql = "SELECT * FROM signos_vitales 
        WHERE id_residente = '$id_residente'
        ORDER BY fecha DESC, hora DESC";

$result = $conexion->query($sql);

$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>