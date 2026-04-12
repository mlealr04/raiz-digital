<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Panel Familiar</title>

<style>
body {
    font-family: Arial;
    background: #f4f4f4;
    padding: 20px;
}

.card {
    background: white;
    padding: 15px;
    margin: 10px 0;
    border-radius: 10px;
}

button {
    background: #c89b4f;
    border: none;
    padding: 10px;
    margin: 5px;
    color: white;
    border-radius: 6px;
    cursor: pointer;
}
</style>
</head>

<body>

<h1>Selecciona un residente</h1>

<?php if ($residentes->num_rows == 0): ?>
    <p>No tienes residentes asignados</p>
<?php else: ?>

    <?php while ($r = $residentes->fetch_assoc()): ?>
        <div class="card">

            <h3><?php echo $r['nombre']; ?></h3>
            <a href="/raiz-digital/seleccionar_residente.php?id_residente=<?php echo $r['id_residente']; ?>&destino=historial">
             <button>Ver historial</button>
            </a>

            <a href="/raiz-digital/seleccionar_residente.php?id_residente=<?php echo $r['id_residente']; ?>&destino=inventario">
             <button>Ver inventario</button>
            </a>

            <a href="/raiz-digital/seleccionar_residente.php?id_residente=<?php echo $r['id_residente']; ?>&destino=gestion">
            <button>Gestión familiar</button>
            </a>

        </div>
    <?php endwhile; ?>

<?php endif; ?>

</body>
</html>