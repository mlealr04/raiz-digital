<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Inventario</title>

<style>
body {
    margin: 0;
    font-family: 'Segoe UI';
    background: #e9e9e9;
}

.header {
    background: linear-gradient(to right, #5a4a2f, #c89b4f);
    color: white;
    padding: 15px 25px;
    display: flex;
    justify-content: space-between;
}

.container {
   height: 80vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.grid {
    display: flex;
    gap: 40px;
}

/* LISTA */
.list {
    width: 60%;
}

.item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #aaa;
    padding: 15px 0;
}

.left {
    display: flex;
    align-items: center;
    gap: 15px;
}

img {
    width: 60px;
}

/* BOTONES + - */
.controls {
    display: flex;
    align-items: center;
    gap: 10px;
}

.btn {
    background: #d1a365;
    border: none;
    padding: 5px 10px;
    border-radius: 8px;
    cursor: pointer;
}

.delete {
    color: red;
    cursor: pointer;
}

/* PANEL DERECHO */
.side {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.card {
    background: #d1a365;
    padding: 20px;
    border-radius: 15px;
    text-align: center;
    cursor: pointer;
    box-shadow: 0px 8px 15px rgba(0,0,0,0.2);
}
img {
    width: 90px;
    height: 90px;
    object-fit: cover;
    border-radius: 15px;
    box-shadow: 0px 5px 10px rgba(0,0,0,0.2);
}
.btn-delete {
    background: #f0e6d6;
    border: none;
    border-radius: 12px;
    padding: 8px;
    cursor: pointer;
    transition: 0.2s;
}

.btn-delete:hover {
    background: #e57373;
    color: white;
    transform: scale(1.1);
}
.btn-delete {
    box-shadow: 0px 3px 6px rgba(0,0,0,0.1);
}
.empty {
    text-align: center;
    color: #555;
    max-width: 400px;
}

.empty .icon {
    font-size: 80px;
    margin-bottom: 15px;
}

.empty h2 {
    font-size: 28px;
    margin-bottom: 10px;
}

.empty p {
    font-size: 16px;
    margin-bottom: 20px;
}

.btn-empty {
    padding: 14px 30px;
    border-radius: 14px;
    background-color: #d1a365;
    font-size: 16px;
    font-weight: bold;
    box-shadow: 0px 6px 12px rgba(0,0,0,0.2);
}

.btn-empty:hover {
    transform: scale(1.05);
}
</style>
</head>

<body>

<div class="header">
    <div>☰ RAÍZ DIGITAL > INVENTARIO</div>
    <a href="/raiz-digital/panel_enfermero.php" style="color:white;">CASA</a>
</div>

<div class="container">

<div class="grid">

    <!-- LISTA -->
    <div class="list">

       <?php if ($productos && $productos->num_rows > 0): ?>
        <?php endif; ?>
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

            <div class="controls">

                <!-- RESTAR -->
                <a href="/raiz-digital/actualizar_cantidad.php?id=<?php echo $p['id_producto']; ?>&tipo=restar">
                    <button class="btn">➖</button>
                </a>

                <!-- SUMAR -->
                <a href="/raiz-digital/actualizar_cantidad.php?id=<?php echo $p['id_producto']; ?>&tipo=sumar">
                    <button class="btn">➕</button>
                </a>

                <!-- ELIMINAR -->
                <a href="/raiz-digital/eliminar_producto.php?id=<?php echo $p['id_producto']; ?>">
                    <button class="btn-delete">🗑</button>
                </a>

                <!-- EDITAR -->
                <a href="/raiz-digital/editar_producto.php?id=<?php echo $p['id_producto']; ?>" class="btn-edit">
                    ✏️
                </a>

            </div>

        </div>

    <?php endwhile; ?>

<?php else: ?>

    <!--  ESTADO VACÍO BONITO -->
    <div class="empty">
        <div class="icon">📦</div>
        <h2>No hay productos</h2>
        <p>Agrega tu primer insumo para comenzar</p>

        <a href="/raiz-digital/views/crear_producto.html">
            <button class="btn-empty">➕ Agregar producto</button>
        </a>
     </div>

        <?php endif; ?>

    </div>

    <!-- BOTONES -->
    <div class="side">

        <a href="/raiz-digital/views/crear_producto.html">
            <div class="card">➕ PRODUCTO</div>
        </a>

    </div>

</div>

</div>

</body>
</html>