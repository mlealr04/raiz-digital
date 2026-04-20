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
    padding: 40px;
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
                    <span class="delete">🗑</span>
                </a>
                <a href="/raiz-digital/editar_producto.php?id=<?php echo $p['id_producto']; ?>">
                    ✏️
                </a>
            </div>

        </div>

        <?php endwhile; ?>

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