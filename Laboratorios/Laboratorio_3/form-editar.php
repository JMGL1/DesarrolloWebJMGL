<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mascota</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <?php
    include("conexion.php");

    if (!isset($_GET['id'])) {
    header("Location: read.php");
    exit;
    }

    $id = $_GET['id'];

    $consulta_mascota = "SELECT * FROM mascotas WHERE id = ?";
    $sentencia = $con->prepare($consulta_mascota);
    $sentencia->bind_param("i", $id);
    $sentencia->execute();
    $resultado_mascota = $sentencia->get_result();

    if ($resultado_mascota->num_rows == 0) {
    header("Location: read.php");
    exit;
    }
    $mascota = $resultado_mascota->fetch_assoc();
    $sentencia->close();

    $consulta_especies = "SELECT id, nombre FROM especies ORDER BY nombre";
    $resultado_especies = $con->query($consulta_especies);
    ?>

    <div class="contenedor">
        <h2>Editar Mascota</h2>
        <form action="update.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $mascota['id']; ?>">
            <input type="hidden" name="fotografia_actual" value="<?php echo htmlspecialchars($mascota['fotografia']); ?>">
            
            <div class="grupo-formulario">
                <label for="fotografia">Nueva Fotografía (opcional):</label>
                <input type="file" name="fotografia" id="fotografia" accept="image/*">
                <?php if (!empty($mascota['fotografia'])): ?>
                <div class="foto-actual">
                    <p>Foto actual:</p>
                    <img src="images/<?php echo htmlspecialchars($mascota['fotografia']); ?>" alt="Foto actual">
                </div>
                <?php endif; ?>
            </div>
            <div class="grupo-formulario">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo htmlspecialchars($mascota['nombre']); ?>" required>
            </div>
            <div class="grupo-formulario">
                <label for="raza">Raza:</label>
                <input type="text" name="raza" id="raza" value="<?php echo htmlspecialchars($mascota['raza']); ?>">
            </div>
            <div class="grupo-formulario">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $mascota['fecha_nacimiento']; ?>">
            </div>
            <div class="grupo-formulario">
                <label for="peso">Peso (kg):</label>
                <input type="number" name="peso" id="peso" step="0.01" min="0" value="<?php echo $mascota['peso']; ?>">
            </div>
            <div class="grupo-formulario">
                <label>Sexo:</label>
                <div class="grupo-radio">
                    <label><input type="radio" name="sexo" value="M" <?php if($mascota['sexo'] == 'M') echo 'checked'; ?> required> Macho</label>
                    <label><input type="radio" name="sexo" value="H" <?php if($mascota['sexo'] == 'H') echo 'checked'; ?> required> Hembra</label>
                </div>
            </div>
            <div class="grupo-formulario">
                <label for="propietario">Propietario:</label>
                <input type="text" name="propietario" id="propietario" value="<?php echo htmlspecialchars($mascota['propietario']); ?>">
            </div>
            <div class="grupo-formulario">
                <label for="especie_id">Especie:</label>
                <select name="especie_id" id="especie_id" required>
                    <option value="">-- Seleccione una especie --</option>
                    <?php
                    if ($resultado_especies->num_rows > 0) {
                        while($fila = $resultado_especies->fetch_assoc()) {
                            $selected = ($fila['id'] == $mascota['especie_id']) ? 'selected' : '';
                            echo "<option value='" . $fila['id'] . "' $selected>" . htmlspecialchars($fila['nombre']) . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="boton">Actualizar Mascota</button>
        </form>
        <div class="enlaces">
            <a href="read.php">Cancelar y volver</a>
        </div>
    </div>
</body>
</html>
