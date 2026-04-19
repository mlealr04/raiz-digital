<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Gestión Familiar</title>

<style>
body {
    margin: 0;
    font-family: 'Segoe UI', Arial;
    background-color: #e9e9e9;
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

.title {
    display: flex;
    align-items: center;
    gap: 15px;
}

.title img {
    width: 60px;
}

h1 {
    font-size: 50px;
    margin: 0;
}

hr {
    margin: 20px 0 30px 0;
    border: 1px solid #bbb;
}

.grid {
    display: flex;
    gap: 40px;
}

.agenda {
    background-color: #cfc5b8;
    border-radius: 15px;
    padding: 20px;
    width: 400px;
    box-shadow: 0px 8px 15px rgba(0,0,0,0.2);
}

.agenda-title {
    font-weight: bold;
    margin-bottom: 15px;
}

.agenda-item {
    border-top: 1px solid #aaa;
    padding: 15px 0;
    display: flex;
    justify-content: space-between;
}

.left {
    display: flex;
    gap: 10px;
}

.dot {
    width: 30px;
    height: 30px;
    background-color: #d89b3c;
    border-radius: 50%;
}

.estado {
    font-size: 12px;
}

.btn {
    display: block;
    margin-top: 5px;
    text-decoration: none;
    font-size: 12px;
}

.confirmar {
    color: green;
}

.rechazar {
    color: red;
}
</style>

</head>

<body>

<div class="header">
    <div>☰ RAÍZ DIGITAL > GESTIÓN FAMILIAR</div>
    <a href="/raiz-digital/panel_familiar.php" style="color:white;">CASA</a>
</div>

<div class="container">

    <div class="title">
        <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png">
        <h1>Actividades del Residente</h1>
    </div>

    <hr>

    <div class="grid">

        <div class="agenda">
            <div class="agenda-title">📅 AGENDA</div>

            <?php if ($result && $result->num_rows > 0): ?>

                <?php while($row = $result->fetch_assoc()): ?>

                    <div class="agenda-item">

                        <div class="left">
                            <div class="dot"></div>
                            <div>
                                <div><?php echo $row['titulo']; ?></div>
                                <small>
                                    <?php echo $row['fecha']; ?> - <?php echo $row['hora']; ?>
                                </small>
                            </div>
                        </div>

                        <div class="estado">

                            <?php
                            $color = "gray";
                            if ($row['estado'] == "confirmado") $color = "green";
                            if ($row['estado'] == "rechazado") $color = "red";
                            ?>

                            <div style="color: <?php echo $color; ?>">
                                <?php echo $row['estado']; ?>
                            </div>

                            <!-- SOLO FAMILIAR -->
                            <a class="btn confirmar"
                               href="/raiz-digital/confirmar_actividad.php?id=<?php echo $row['id_actividad']; ?>&estado=confirmado">
                               ✔ Confirmar
                            </a>

                            <a class="btn rechazar"
                               href="/raiz-digital/confirmar_actividad.php?id=<?php echo $row['id_actividad']; ?>&estado=rechazado">
                               ✖ Rechazar
                            </a>

                        </div>

                    </div>

                <?php endwhile; ?>

            <?php else: ?>
                <p>No hay actividades</p>
            <?php endif; ?>

        </div>

    <?php
    $sqlAvisos = "SELECT * FROM avisos 
              WHERE id_residente = '$id_residente'";
    $avisos = $conexion->query($sqlAvisos);
    ?>

    <div class="agenda">
    <div class="agenda-title">🔔 AVISOS</div>

    <?php if ($avisos && $avisos->num_rows > 0): ?>
        <?php while($a = $avisos->fetch_assoc()): ?>
            <div class="agenda-item">
                <div>
                    <strong><?php echo $a['titulo']; ?></strong><br>
                    <?php echo $a['descripcion']; ?><br>
                    Cantidad: <?php echo $a['cantidad']; ?><br>
                    Fecha: <?php echo $a['fecha']; ?>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No hay avisos</p>
    <?php endif; ?>
    </div>
    </div>

</div>

</body>
</html>