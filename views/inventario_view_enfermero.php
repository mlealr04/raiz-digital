<div class="grid">

    <!-- LISTA -->
    <div class="agenda">

        <input type="text" placeholder="🔍 Búsqueda personalizada" style="width:90%; padding:10px; border-radius:20px;">

        <hr>

        <?php while($p = $productos->fetch_assoc()): ?>

        <div class="agenda-item">

            <div class="left">
                <img src="/raiz-digital/uploads/<?php echo $p['imagen']; ?>" width="60">

                <div>
                    <div><?php echo $p['nombre']; ?></div>
                    <small>Stock: <?php echo $p['cantidad']; ?></small>
                </div>
            </div>

            <a href="/raiz-digital/eliminar_producto.php?id=<?php echo $p['id_producto']; ?>">
                🗑
            </a>

        </div>

        <?php endwhile; ?>

    </div>

    <!-- BOTONES -->
    <div class="cards">

        <a href="/raiz-digital/views/crear_producto.html">
            <div class="card">➕ PRODUCTO</div>
        </a>

        <div class="card">📦 REABASTECIMIENTO</div>

    </div>

</div>