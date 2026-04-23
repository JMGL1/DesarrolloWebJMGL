<?php
include("conexion.php");


$consulta_especies = "SELECT e.nombre, COUNT(m.id) AS total 
                 FROM especies e 
                 LEFT JOIN mascotas m ON m.especie_id = e.id 
                 GROUP BY e.id";
$resultado_especies = $con->query($consulta_especies);

$consulta_sexo = "SELECT sexo, COUNT(id) AS total 
             FROM mascotas 
             WHERE sexo IN ('M', 'H') 
             GROUP BY sexo";
$resultado_sexo = $con->query($consulta_sexo);


$consulta_total = "SELECT COUNT(id) AS total_general FROM mascotas";
$resultado_total = $con->query($consulta_total);
$total_general = 0;
if ($fila_total = $resultado_total->fetch_assoc()) {
    $total_general = $fila_total['total_general'];
}


$iconos_especies = [
    'Perro' => '🐶',
    'Gato' => '🐱',
    'Ave' => '🐦',
    'Roedor' => '🐹',
    'Reptil' => '🦎'
];


$icono_defecto = '🐾';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes de Mascotas</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="contenedor">
        <h2>Reportes Estadísticos de la Clínica Veterinaria</h2>
        
        <h3>Mascotas por Especie</h3>
        <table class="tabla-compacta">
            <thead>
                <tr>
                    <th class="icono">Icono</th>
                    <th>Especie</th>
                    <th class="numero">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($resultado_especies && $resultado_especies->num_rows > 0) {
                    while($fila = $resultado_especies->fetch_assoc()) {
                        $especie = $fila['nombre'];
                        $total = $fila['total'];
                        $icono = isset($iconos_especies[$especie]) ? $iconos_especies[$especie] : $icono_defecto;
                        
                        echo "<tr>";
                        echo "<td class='icono'>{$icono}</td>";
                        echo "<td>" . htmlspecialchars($especie) . "</td>";
                        echo "<td class='numero'>{$total}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No hay datos disponibles.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        
        <h3>Mascotas por Sexo</h3>
        <table class="tabla-compacta">
            <thead>
                <tr>
                    <th class="icono">Icono</th>
                    <th>Sexo</th>
                    <th class="numero">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $machos = 0;
                $hembras = 0;
                if ($resultado_sexo && $resultado_sexo->num_rows > 0) {
                    while($fila = $resultado_sexo->fetch_assoc()) {
                        if ($fila['sexo'] == 'M') $machos = $fila['total'];
                        if ($fila['sexo'] == 'H') $hembras = $fila['total'];
                    }
                }
                ?>
                <tr>
                    <td class="icono">♂</td>
                    <td>Machos</td>
                    <td class="numero"><?php echo $machos; ?></td>
                </tr>
                <tr>
                    <td class="icono">♀</td>
                    <td>Hembras</td>
                    <td class="numero"><?php echo $hembras; ?></td>
                </tr>
            </tbody>
        </table>
        
        <div class="total-general">
            TOTAL GENERAL DE MASCOTAS REGISTRADAS: <?php echo $total_general; ?>
        </div>
        
        <div style="text-align: center;">
            <a href="read.php" class="boton-volver">Volver al Listado</a>
        </div>
    </div>
</body>
</html>
