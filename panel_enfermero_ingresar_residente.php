<?php
session_start();

// Verificar sesión
if (!isset($_SESSION['id_usuario'])) {
    die(" No has iniciado sesión");
}

//  CASO 1: SELECCIONAR RESIDENTE
if (isset($_POST['id_residente'])) {

    $id_residente = $_POST['id_residente'];

    $_SESSION['id_residente'] = $id_residente;

    header("Location: panel_residente.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Buscar Residente</title>

<style>
body {
    margin: 0;
    font-family: 'Segoe UI', Arial;
    background-color: #e9e9e9;
}

.header {
    background: linear-gradient(to right, #5a4a2f, #c89b4f);
    color: white;
    padding: 15px 25px;
    font-size: 14px;
}

.container {
    padding: 40px;
}

h1 {
    font-size: 40px;
}

/* BUSCADOR */
.buscador {
    margin-bottom: 30px;
}

input {
    padding: 10px;
    width: 300px;
    border-radius: 8px;
    border: 1px solid #aaa;
}

button {
    padding: 10px 20px;
    border: none;
    border-radius: 10px;
    background-color: #5a4a2f;
    color: white;
    cursor: pointer;
    margin-left: 10px;
}

button:hover {
    background-color: #c89b4f;
}

/* TARJETAS */
.card {
    background-color: #cfc5b8;
    border-radius: 15px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0px 8px 15px rgba(0,0,0,0.2);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.info {
    display: flex;
    flex-direction: column;
}

.id {
    font-size: 12px;
    color: #555;
}

.nombre {
    font-size: 20px;
    font-weight: bold;
}

.select-btn {
    background-color: #d1a365;
    padding: 10px 20px;
    border-radius: 10px;
    border: none;
    cursor: pointer;
}

.select-btn:hover {
    transform: scale(1.05);
}
</style>

</head>

<body>


<div class="header">
    ☰ RAÍZ DIGITAL > BUSCAR RESIDENTE
</div>

<div class="container">

    <h1>Buscar Residente</h1>
<form method="POST" class="buscador">

    <input type="text" name="busqueda" placeholder="ID o Nombre del residente" required>

    <button type="submit">Buscar</button>

</form>
    <?php
    // CASO 2: BUSCAR
    if (isset($_POST['busqueda'])) {

        $conexion = new mysqli("localhost", "root", "", "raizdigital");

        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        $busqueda = $_POST['busqueda'];

        if (is_numeric($busqueda)) {
            $sql = "SELECT * FROM residentes WHERE id_residente = '$busqueda'";
        } else {
            $sql = "SELECT * FROM residentes WHERE nombre LIKE '%$busqueda%'";
        }

        $result = $conexion->query($sql);

        if ($result && $result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                echo "
                <div class='card'>

                    <div class='info'>
                        <div class='id'>ID: {$row['id_residente']}</div>
                        <div class='nombre'>{$row['nombre']}</div>
                    </div>

                    <form method='POST'>
                        <input type='hidden' name='id_residente' value='{$row['id_residente']}'>
                        <button class='select-btn'>Seleccionar</button>
                    </form>

                </div>
                ";
            }

        } else {
            echo "<p>No se encontraron residentes</p>";
        }

        $conexion->close();
    }
    ?>

</div>

</body>
</html>