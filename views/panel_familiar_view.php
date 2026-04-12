<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Historial Médico</title>

<style>
body {
    font-family: 'Segoe UI', Arial;
    margin: 0;
    background-color: #f4f4f4;
}

.header {
    background: linear-gradient(to right, #6b5b3e, #c89b4f);
    color: white;
    padding: 15px 30px;
    font-weight: bold;
}

.container {
    padding: 30px;
}

button {
    background-color: #c89b4f;
    border: none;
    padding: 10px 18px;
    border-radius: 8px;
    color: white;
    cursor: pointer;
    font-weight: bold;
}

.card {
    background-color: #fff;
    border-radius: 15px;
    padding: 20px;
    margin-top: 20px;
}

input {
    padding: 8px;
    border-radius: 6px;
    border: 1px solid #ccc;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}

thead {
    background-color: #c89b4f;
    color: white;
}

th, td {
    padding: 10px;
    text-align: center;
}

.no-data {
    text-align: center;
    padding: 15px;
}
</style>
</head>

<body>

<div class="header">
    RAÍZ DIGITAL > HISTORIAL MÉDICO
</div>

<div class="container">

    <a href="../panel_familiar.php">
        <button>⬅ Regresar</button>
    </a>

    <h1>Historial Médico del Residente</h1>

    <div class="card">

        <form method="GET" action="../historial_familiar.php">
            <label>Selecciona fecha:</label>
            <input type="date" name="fecha" value="<?php echo $fecha; ?>">
            <button type="submit">Ver</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Hora</th>
                    <th>Presión</th>
                    <th>Temp</th>
                    <th>FC</th>
                    <th>FR</th>
                    <th>O2</th>
                    <th>Glucosa</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
            <tbody>

            <?php if ($result->num_rows == 0): ?>
                <tr>
                    <td colspan="8" class="no-data">Sin registros</td>
                </tr>
            <?php else: ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['hora']; ?></td>
                        <td><?php echo $row['presion']; ?></td>
                        <td><?php echo $row['temperatura']; ?></td>
                        <td><?php echo $row['frecuencia_cardiaca']; ?></td>
                        <td><?php echo $row['frecuencia_respiratoria']; ?></td>
                        <td><?php echo $row['oxigeno']; ?></td>
                        <td><?php echo $row['glucosa']; ?></td>
                        <td><?php echo $row['observaciones']; ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php endif; ?>

            </tbody>
        </table>

    </div>

</div>

</body>
</html>