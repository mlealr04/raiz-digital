<?php
session_start();
// Verificar sesión de enfermero
if (!isset($_SESSION['id_usuario'])) {
    die(" No has iniciado sesión");
}

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "raizdigital");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$busqueda = $_POST['busqueda'];

// si número o texto
if (is_numeric($busqueda)) {
    $sql = "SELECT * FROM residentes WHERE id_residente = '$busqueda'";
} else {
    $sql = "SELECT * FROM residentes WHERE nombre LIKE '%$busqueda%'";
}

$result = $conexion->query($sql);

if ($result->num_rows > 0) {

    echo "<h2>Resultados:</h2>";

    while ($row = $result->fetch_assoc()) {

        echo "
        <div style='margin-bottom:20px; border:1px solid #c19999; padding:10px;'>

            <p><strong>ID:</strong> {$row['id_residente']}</p>
            <p><strong>Nombre:</strong> {$row['nombre']}</p>

            <form action='panel_enfermero_ingresar_residente.php' method='POST'>
                <input type='hidden' name='id_residente' value='{$row['id_residente']}'>
                <button type='submit'>Seleccionar</button>
            </form>

        </div>
        ";
    }

} else {
    echo " No se encontraron residentes";
}

$conexion->close();
?>