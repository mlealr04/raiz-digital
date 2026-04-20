<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Inventario</title>

<style>
.container {
    padding: 40px;
}

/* 🔥 CUANDO HAY PRODUCTOS */
.has-products {
    display: flex;
    justify-content: flex-start;
}

/* 🔥 CUANDO NO HAY */
.empty-mode {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 70vh;
}

/* LISTA */
.list {
    width: 100%;
    max-width: 700px;
}

/* ITEM */
.item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #aaa;
    padding: 20px 0;
}

/* IZQUIERDA */
.left {
    display: flex;
    align-items: center;
    gap: 20px;
}

/* IMAGEN (CLAVE DEL PROBLEMA) */
img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 12px;
}

/* ESTADO */
.estado {
    font-weight: bold;
}

</style>
<div class="header">
    <div>☰ RAÍZ DIGITAL > INVENTARIO</div>
    <a href="/raiz-digital/panel_familiar.php" style="color:white;">CASA</a>
</div>

<div class="container">

<div class="grid <?php echo ($productos && $productos->num_rows > 0) ? 'has-products' : 'empty-mode'; ?>">

    <div class="list">

    <?php if ($productos && $productos->num_rows > 0): ?>

        <?php while($p = $productos->fetch_assoc()): ?>

            <div class="item">

                <div class="left">
                    <img src="/raiz-digital/uploads/<?php echo $p['imagen']; ?>">

                    <div>
                        <strong><?php echo $p['nombre']; ?></strong><br>
                        Stock: <?php echo $p['cantidad'] . " " . $p['tipo']; ?><br>
                        <small><?php echo $p['especificaciones']; ?></small>
                    </div>
                </div>

                <div class="estado">
                    <?php if ($p['cantidad'] <= 3): ?>
                        <span style="color:red;">⚠ Bajo stock</span>
                    <?php else: ?>
                        <span style="color:green;">Disponible</span>
                    <?php endif; ?>
                </div>

            </div>

        <?php endwhile; ?>

    <?php else: ?>

        <div class="empty">
            <div class="icon">📦</div>
            <h2>No hay productos</h2>
            <p>Actualmente no hay insumos registrados</p>
        </div>

    <?php endif; ?>

    </div>

</div>

</div>