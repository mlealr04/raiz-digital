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
                <?php if (!empty($p['imagen'])): ?>
                    <img src="/raiz-digital/uploads/<?php echo $p['imagen']; ?>">
                <?php else: ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png">
                <?php endif; ?>

                <div>
                    <strong><?php echo $p['nombre']; ?></strong><br>
                    Stock: <?php echo $p['cantidad'] . " " . $p['tipo']; ?><br>
                    <small><?php echo $p['especificaciones']; ?></small>
                </div>
            </div>

            <!-- 🔥 SOLO VISUAL (SIN BOTONES) -->
            <div style="color:#888; font-size:14px;">
                Disponible
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