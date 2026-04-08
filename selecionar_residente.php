<?php
session_start();
$_SESSION['id_residente'] = $_POST['id_residente'];
echo "ok";
if (!isset($_POST['id_residente'])) {
    die(" No se recibió residente");
}

$_SESSION['id_residente'] = $_POST['id_residente'];

echo "ok";
?>