<?php
require 'conexion.php';

$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : 'Todos';

// Obtener tipos para el select
$sqlTipos = "SELECT id, tiporeceta FROM tiporeceta";
$stmtTipos = $pdo->query($sqlTipos);
$tipos = $stmtTipos->fetchAll();

// Obtener recetas filtradas
if ($tipo !== 'Todos' && is_numeric($tipo)) {
    $sqlRecetas = "SELECT r.id, r.fotografia, r.titulo, r.preparacion, t.tiporeceta 
                   FROM recetas r 
                   JOIN tiporeceta t ON r.idtiporeceta = t.id 
                   WHERE r.idtiporeceta = ?";
    $stmtRecetas = $pdo->prepare($sqlRecetas);
    $stmtRecetas->execute([$tipo]);
} else {
    $sqlRecetas = "SELECT r.id, r.fotografia, r.titulo, r.preparacion, t.tiporeceta 
                   FROM recetas r 
                   JOIN tiporeceta t ON r.idtiporeceta = t.id";
    $stmtRecetas = $pdo->query($sqlRecetas);
}
$recetas = $stmtRecetas->fetchAll();
?>
<div>
    <h3>Listado de Recetas</h3>
    <label for="filtroTipo">Filtrar por tipo:</label>
    <select id="filtroTipo" onchange="filtrarRecetas(this.value)">
        <option value="Todos" <?php echo ($tipo === 'Todos') ? 'selected' : ''; ?>>Todos</option>
        <?php foreach ($tipos as $t): ?>
            <option value="<?php echo $t['id']; ?>" <?php echo ($tipo == $t['id']) ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($t['tiporeceta']); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <table border="1" style="width: 100%; margin-top: 15px; border-collapse: collapse; text-align: left;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fotografía</th>
                <th>Título</th>
                <th>Tipo</th>
                <th>Preparación Abreviada</th>
            </tr>
        </thead>
        <tbody id="cuerpo-tabla">
            <?php foreach ($recetas as $r): ?>
                <tr>
                    <td><?php echo $r['id']; ?></td>
                    <td>
                        <img src="images/<?php echo htmlspecialchars($r['fotografia']); ?>" alt="img" width="50" height="50">
                    </td>
                    <td><?php echo htmlspecialchars($r['titulo']); ?></td>
                    <td><?php echo htmlspecialchars($r['tiporeceta']); ?></td>
                    <td><?php echo htmlspecialchars(substr($r['preparacion'], 0, 50)); ?><?php echo strlen($r['preparacion']) > 50 ? '...' : ''; ?></td>
                </tr>
            <?php endforeach; ?>
            <?php if(count($recetas) == 0): ?>
                <tr><td colspan="5">No hay recetas de este tipo.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
