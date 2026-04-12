<?php
session_start();

$_SESSION['id_residente'] = $_GET['id_residente'];

$destino = $_GET['destino'];

switch ($destino) {
    case "historial":
        header("Location: historial_familiar.php");
        break;

    case "inventario":
        header("Location: inventario_familiar.php");
        break;

    case "gestion":
        header("Location: gestion_familiar.php");
        break;

    default:
        echo "Destino no válido";
        break;
}

exit();
?>