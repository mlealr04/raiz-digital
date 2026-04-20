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

.item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #f5efe6;
    border-radius: 16px;
    padding: 15px 20px;
    margin-bottom: 15px;
    box-shadow: 0px 6px 12px rgba(0,0,0,0.1);
    transition: 0.2s;
}

.item:hover {
    transform: scale(1.02);
}

/* IZQUIERDA */
.left {
    display: flex;
    align-items: center;
    gap: 15px;
}

/* IMAGEN */
img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 12px;
}

/* INFO */
.info {
    display: flex;
    flex-direction: column;
}

.nombre {
    font-weight: bold;
    font-size: 18px;
    color: #3a2e1f;
}

.stock {
    font-size: 14px;
    color: #666;
}

.esp {
    font-size: 13px;
    color: #999;
}
/* ESTADO */
.estado {
    padding: 8px 14px;
    border-radius: 12px;
    font-size: 14px;
    font-weight: bold;
}

/* VERDE */
.estado.ok {
    background: #d4edda;
    color: #2e7d32;
}

/* ROJO */
.estado.bajo {
    background: #f8d7da;
    color: #c62828;
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

                    <div class="info">
                        <div class="nombre"><?php echo $p['nombre']; ?></div>
                        <div class="stock">
                            <?php echo $p['cantidad'] . " " . $p['tipo']; ?>
                        </div>
                        <div class="esp"><?php echo $p['especificaciones']; ?></div>
                    </div>
                </div>

                <div class="estado 
                    <?php echo ($p['cantidad'] <= 3) ? 'bajo' : 'ok'; ?>">
                    
                    <?php echo ($p['cantidad'] <= 3) ? '⚠ Bajo stock' : '✔ Disponible'; ?>
                
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