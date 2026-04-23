<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Mascota</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php
    include("conexion.php");

    $consulta = "SELECT id, nombre FROM especies ORDER BY nombre";
    $resultado = $con->query($consulta);
    ?>
    <div class="contenedor">
        <h2>Registrar Nueva Mascota</h2>
        <form action="create.php" method="POST" enctype="multipart/form-data">
            <div class="grupo-formulario">
                <label for="fotografia">Fotografía:</label>
                <input type="file" name="fotografia" id="fotografia" accept="image/*" required>
            </div>
            <div class="grupo-formulario">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" required>
            </div>
            <div class="grupo-formulario">
                <label for="raza">Raza:</label>
                <input type="text" name="raza" id="raza">
            </div>
            <div class="grupo-formulario">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento">
            </div>
            <div class="grupo-formulario">
                <label for="peso">Peso (kg):</label>
                <input type="number" name="peso" id="peso" step="0.01" min="0">
            </div>
            <div class="grupo-formulario">
                <label>Sexo:</label>
                <div class="grupo-radio">
                    <label><input type="radio" name="sexo" value="M" required> Macho</label>
                    <label><input type="radio" name="sexo" value="H" required> Hembra</label>
                </div>
            </div>
            <div class="grupo-formulario">
                <label for="propietario">Propietario:</label>
                <input type="text" name="propietario" id="propietario">
            </div>
            <div class="grupo-formulario">
                <label for="especie_id">Especie:</label>
                <select name="especie_id" id="especie_id" required>
                    <option value="">-- Seleccione una especie --</option>
                    <?php
                    if ($resultado->num_rows > 0) {
                        while($fila = $resultado->fetch_assoc()) {
                            echo "<option value='" . $fila['id'] . "'>" . htmlspecialchars($fila['nombre']) . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="boton">Registrar Mascota</button>
        </form>
        <div class="enlaces">
            <a href="read.php">Volver al listado</a>
        </div>
    </div>
</body>
</html>
