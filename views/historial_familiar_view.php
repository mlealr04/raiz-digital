<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Historial Médico</title>

<style>
body {
    font-family: Arial;
    background: #f4f4f4;
    padding: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: center;
}

th {
    background: #c89b4f;
    color: white;
}
</style>
</head>

<body>

<h1>Historial Médico</h1>

<a href="/raiz-digital/panel_familiar.php">
    <button>⬅ Regresar</button>
</a>
<form method="GET" action="/raiz-digital/historial_familiar.php">

    <label>Selecciona fecha:</label>

    <input 
        type="date" 
        name="fecha" 
        value="<?php echo isset($fecha) ? $fecha : ''; ?>"
        required
    >

    <button type="submit">Ver</button>

</form>
<table>
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

<?php if ($result->num_rows == 0): ?>
<tr>
    <td colspan="8">Sin registros</td>
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

</table>

</body>
</html>