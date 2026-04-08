<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    echo json_encode([]);
    exit();
}

$id_usuario = $_SESSION['id_usuario'];

$conexion = new mysqli("localhost", "root", "", "raizdigital");

if ($conexion->connect_error) {
    echo json_encode([]);
    exit();
}

$sql = "SELECT r.id_residente, r.nombre 
        FROM residentes r
        INNER JOIN familiares f ON r.id_familiar = f.id_familiar
        WHERE f.id_usuario = '$id_usuario'";

$result = $conexion->query($sql);

$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);

$conexion->close();
?>