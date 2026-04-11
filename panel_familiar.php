<?php
session_start();

$conexion = new mysqli("localhost", "root", "", "raizdigital");

$id_usuario = $_SESSION['id_usuario'];

// obtener familiar
$sql_familiar = "SELECT id_familiar FROM familiares WHERE id_usuario = '$id_usuario'";
$result = $conexion->query($sql_familiar);
$familiar = $result->fetch_assoc();
$id_familiar = $familiar['id_familiar'];

// obtener residentes
$sql_residentes = "SELECT * FROM residentes WHERE id_familiar = '$id_familiar'";
$residentes = $conexion->query($sql_residentes);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Panel Familiar</title>
</head>
<body>

<h1>Selecciona un residente</h1>

<?php if ($residentes->num_rows == 0): ?>

    <p>No tienes residentes asignados</p>

<?php else: ?>

    <?php while ($r = $residentes->fetch_assoc()): ?>
        
        <div style="border:1px solid black; margin:10px; padding:10px;">
            <p><strong><?php echo $r['nombre']; ?></strong></p>

            <a href="seleccionar_residente.php?id_residente=<?php echo $r['id_residente']; ?>&destino=historial">
                <button>Ver historial</button>
            </a>

            <a href="seleccionar_residente.php?id_residente=<?php echo $r['id_residente']; ?>&destino=inventario">
                <button>Ver inventario</button>
            </a>

            <a href="gestion_familiar.php?id_residente=<?php echo $r['id_residente']; ?>">
                <button>Gestión familiar</button>
            </a>
        </div>

    <?php endwhile; ?>

<?php endif; ?>

</body>
</html>