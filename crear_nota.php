<?php
session_start();

$conexion = new mysqli("localhost", "root", "", "raizdigital");

$id_residente = $_SESSION['id_residente'];
$id_usuario = $_SESSION['id_usuario'];
$rol = $_SESSION['rol'];

$contenido = $_POST['contenido'];

$sql = "INSERT INTO notas 
(id_residente, id_usuario, tipo, contenido, fecha)
VALUES 
('$id_residente', '$id_usuario', '$rol', '$contenido', NOW())";

$conexion->query($sql);

// redirección según rol
if ($rol == "enfermero") {
    header("Location: gestion_familiar.php");
} else {
   header("Location: gestion_familiar_familiar.php");
}

exit();
?>