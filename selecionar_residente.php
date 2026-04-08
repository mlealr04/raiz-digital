<?php
session_start();

if (!isset($_POST['id_residente'])) {
    die(" No se recibió residente");
}

$_SESSION['id_residente'] = $_POST['id_residente'];

echo "ok";
<?php
session_start();

$_SESSION['id_residente'] = $_POST['id_residente'];

var_dump($_SESSION); //  DEBUG
?>
?>