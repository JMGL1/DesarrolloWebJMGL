<?php
require 'conexion.php';

$sql = "SELECT r.*, t.tiporeceta FROM recetas r JOIN tiporeceta t ON r.idtiporeceta = t.id";
$stmt = $pdo->query($sql);
$recetas = $stmt->fetchAll();
?>
<h2>Galería de recetas</h2>
<div class="galeria-grid">
    <?php foreach ($recetas as $r): ?>
        <div class="galeria-item" onclick="mostrarModalReceta(<?php echo $r['id']; ?>)">
            <img src="images/<?php echo htmlspecialchars($r['fotografia']); ?>" alt="<?php echo htmlspecialchars($r['titulo']); ?>">
        </div>
    <?php endforeach; ?>
</div>
