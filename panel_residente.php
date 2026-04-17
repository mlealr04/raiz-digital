<?php
session_start();

if (!isset($_SESSION['id_residente'])) {
    die(" No has seleccionado un residente");
}

//echo "Residente ID: " . $_SESSION['id_residente'];

$id_residente = $_SESSION['id_residente'];
// CONEXIÓN
$conexion = new mysqli("localhost", "root", "", "raizdigital");

if ($conexion->connect_error) {
    die("Error conexión");
}

// OBTENER NOMBRE DEL RESIDENTE
$sql = "SELECT nombre FROM residentes WHERE id_residente = '$id_residente'";
$result = $conexion->query($sql);

$nombre_residente = "Desconocido";

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombre_residente = $row['nombre'];
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Panel del Residente</title>

<style>
body {
    margin: 0;
    font-family: 'Segoe UI', Arial;
    background-color: #e9e9e9;
}

/* HEADER */
.header {
    background: linear-gradient(to right, #5a4a2f, #c89b4f);
    color: white;
    padding: 15px 25px;
    font-size: 14px;
}

/* CONTENIDO */
.container {
    padding: 40px;
    text-align: center;
}

h1 {
    font-size: 40px;
    margin-bottom: 10px;
}

h2 {
    margin-bottom: 40px;
    color: #555;
}

/* CARDS */
.cards {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
}

.card {
    background-color: #d1a365;
    width: 200px;
    height: 150px;
    border-radius: 20px;
    box-shadow: 0px 8px 15px rgba(0,0,0,0.2);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-decoration: none;
    color: black;
    font-weight: bold;
    transition: 0.3s;
}

.card:hover {
    transform: scale(1.08);
}

.icon {
    font-size: 40px;
    margin-top: 10px;
}
</style>

</head>

<body>

<div class="header">
    ☰ RAÍZ DIGITAL > PANEL RESIDENTE
</div>

<div class="container">

   <h1>Residente seleccionado: <?php echo $nombre_residente; ?></h1>

    <h2>Opciones</h2>

    <div class="cards">

        <a href="signos_vitales.html" class="card">
            SIGNOS VITALES
            <div class="icon">❤️</div>
        </a>

        <a href="inventario.html" class="card">
            INVENTARIO
            <div class="icon">📦</div>
        </a>

        <a href="gestion_familiar.php" class="card">
            GESTIÓN FAMILIAR
            <div class="icon">👨‍👩‍👧</div>
        </a>

    </div>

</div>

</body>
</html>