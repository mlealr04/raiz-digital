<?php
session_start();

$id_residente = $_SESSION['id_residente'];

$conexion = new mysqli("localhost", "root", "", "raizdigital");

$sql = "SELECT * FROM productos WHERE id_residente = '$id_residente'";
$productos = $conexion->query($sql);

//  IMPORTANTE
include("views/inventario_view_familiar.php");