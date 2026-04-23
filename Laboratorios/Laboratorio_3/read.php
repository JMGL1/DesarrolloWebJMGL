<?php
include("conexion.php");

$buscar = isset($_GET['buscar']) ? $_GET['buscar'] : '';
$orden = isset($_GET['orden']) ? $_GET['orden'] : 'm.id';

$ordenes_permitidas = ['m.id', 'm.nombre', 'm.raza', 'm.fecha_nacimiento', 'm.peso', 'm.sexo', 'm.propietario', 'e.nombre'];
if (!in_array($orden, $ordenes_permitidas)) {
    $orden = 'm.id';
}

$consulta = "SELECT m.*, e.nombre AS especie_nombre 
        FROM mascotas m 
        LEFT JOIN especies e ON m.especie_id = e.id ";

if ($buscar !== '') {
    $buscar_escapado = $con->real_escape_string($buscar);
    $consulta .= "WHERE m.nombre LIKE '%" . $buscar_escapado . "%' ";
}

$consulta .= "ORDER BY " . $orden;

$resultado = $con->query($consulta);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Mascotas</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="contenedor">
        <div class="barra-superior">
            <h2>Listado de Mascotas</h2>
            <div>
                <a href="form-insertar.php" class="boton-agregar">Registrar Mascota</a>
                <a href="reporte-especies.php" class="boton-reporte">Ver Reportes</a>
            </div>
        </div>

        <form class="formulario-busqueda" method="GET" action="read.php">
            <input type="text" name="buscar" placeholder="Buscar por nombre..." value="<?php echo htmlspecialchars($buscar); ?>">
            <button type="submit">Buscar</button>
            <?php if($buscar !== ''): ?>
                <a href="read.php" style="padding: 8px; text-decoration: none; color: #e74c3c;">Limpiar</a>
            <?php endif; ?>
        </form>

        <table>
            <thead>
                <tr>
                    <th><a href="read.php?orden=m.id&buscar=<?php echo urlencode($buscar); ?>">Nro</a></th>
                    <th>Fotografía</th>
                    <th><a href="read.php?orden=m.nombre&buscar=<?php echo urlencode($buscar); ?>">Nombre</a></th>
                    <th><a href="read.php?orden=m.raza&buscar=<?php echo urlencode($buscar); ?>">Raza</a></th>
                    <th><a href="read.php?orden=m.fecha_nacimiento&buscar=<?php echo urlencode($buscar); ?>">Fecha Nacimiento</a></th>
                    <th><a href="read.php?orden=m.peso&buscar=<?php echo urlencode($buscar); ?>">Peso</a></th>
                    <th><a href="read.php?orden=m.sexo&buscar=<?php echo urlencode($buscar); ?>">Sexo</a></th>
                    <th><a href="read.php?orden=m.propietario&buscar=<?php echo urlencode($buscar); ?>">Propietario</a></th>
                    <th><a href="read.php?orden=e.nombre&buscar=<?php echo urlencode($buscar); ?>">Especie</a></th>
                    <th>Operaciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($resultado && $resultado->num_rows > 0) {
                    while($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $fila['id'] . "</td>";
                        echo "<td>";
                        if (!empty($fila['fotografia'])) {
                            echo "<img width='80' src='images/" . htmlspecialchars($fila['fotografia']) . "' alt='Foto'>";
                        } else {
                            echo "Sin foto";
                        }
                        echo "</td>";
                        echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['raza']) . "</td>";
                        echo "<td>" . ($fila['fecha_nacimiento'] ? date('d/m/Y', strtotime($fila['fecha_nacimiento'])) : '') . "</td>";
                        echo "<td>" . ($fila['peso'] !== null ? htmlspecialchars($fila['peso']) . " kg" : '') . "</td>";
                        echo "<td>" . ($fila['sexo'] == 'M' ? 'Macho' : 'Hembra') . "</td>";
                        echo "<td>" . htmlspecialchars($fila['propietario']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['especie_nombre']) . "</td>";
                        echo "<td class='enlaces-accion'>";
                        echo "<a href='form-editar.php?id=" . $fila['id'] . "'>Editar</a>";
                        echo "<a href='delete.php?id=" . $fila['id'] . "' class='eliminar' onclick='return confirm(\"¿Está seguro de eliminar esta mascota?\");'>Eliminar</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10' class='estado-vacio'>No se encontraron mascotas registradas.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
