<?php
session_start();

$_SESSION['id_residente'] = $_GET['id_residente'];

header("Location: historial_familiar.php");
exit();
?>