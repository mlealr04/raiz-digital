<?php
session_start();

$conexion = new mysqli("localhost", "root", "", "raizdigital");

$sql = "SELECT * FROM productos";
$productos = $conexion->query($sql);

include("views/inventario_view_enfermero.php");