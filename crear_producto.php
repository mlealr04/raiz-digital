<?php
session_start();

if (!isset($_SESSION['id_enfermero'])) {
    header("Location: ../login.php");
    exit();
}
?>

<link rel="stylesheet" href="../css/estilos.css">

<div class="formulario">

<form action="guardar_producto.php" method="POST" enctype="multipart/form-data">

    <input type="text" name="nombre" placeholder="Nombre del producto" required>

    <textarea name="descripcion" placeholder="Descripción"></textarea>

    <input type="number" name="stock" placeholder="Stock inicial" required>

    <input type="file" name="imagen" required>

    <button class="btn-panel" type="submit">Guardar</button>

</form>

</div>