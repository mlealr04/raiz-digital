<?php
session_start();
var_dump($_SESSION);
die();

session_start();

if (!isset($_SESSION['id_residente'])) {
    echo json_encode([]);
    exit();
}

$id_residente = $_SESSION['id_residente'];

$conexion = new mysqli("localhost", "root", "", "raizdigital");

$fecha = $_GET['fecha'];

$sql = "SELECT * FROM signos_vitales 
        WHERE id_residente = '$id_residente' 
        AND fecha = '$fecha'
        ORDER BY hora DESC";

$result = $conexion->query($sql);

$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>