<?php
session_start();
include("../conexion.php");

if (!isset($_SESSION['id_enfermero'])) {
    header("Location: ../login.php");
    exit();
}

$sql = "SELECT * FROM productos WHERE activo = 1";
$resultado = $conexion->query($sql);
?>

<link rel="stylesheet" href="../css/estilos.css">

<div class="container">

    <!-- IZQUIERDA -->
    <div class="lista-productos">

        <div class="buscador">
            <input type="text" placeholder="🔍 Búsqueda personalizada">
        </div>

        <?php while ($row = $resultado->fetch_assoc()) { ?>

            <div class="producto">

                <div class="producto-info">
                    <img src="../<?php echo $row['imagen']; ?>">

                    <div class="producto-nombre">
                        <strong><?php echo $row['nombre']; ?></strong><br>
                        Stock: <?php echo $row['stock_actual']; ?>
                    </div>
                </div>

                <a class="eliminar"
                   href="eliminar_producto.php?id=<?php echo $row['id_producto']; ?>">
                    🗑
                </a>

            </div>

        <?php } ?>

    </div>

    <!-- DERECHA -->
    <div class="panel">

        <button class="btn-panel">
            📦 REABASTECIMIENTO
        </button>

        <button class="btn-panel" onclick="window.location='crear_producto.php'">
            ➕ PRODUCTO
        </button>

    </div>

</div>