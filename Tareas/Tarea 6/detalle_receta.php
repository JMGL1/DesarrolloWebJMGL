<?php
require 'conexion.php';

if (!isset($_GET['id'])) {
    die("ID no especificado");
}

$id = $_GET['id'];
$sql = "SELECT r.*, t.tiporeceta FROM recetas r JOIN tiporeceta t ON r.idtiporeceta = t.id WHERE r.id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$receta = $stmt->fetch();

if (!$receta) {
    die("Receta no encontrada");
}

$ingredientes_posibles = [
    "Sal", "Pimienta", "Aceite de Oliva", "Ajo", "Cebolla",
    "Tomate", "Zanahoria", "Harina", "Huevos", "Leche",
    "Mantequilla", "Azúcar", "Agua", "Queso", "Pollo"
];
shuffle($ingredientes_posibles);
$ingredientes = array_slice($ingredientes_posibles, 0, 5);
?>
<div class="modal">
    <div class="modal-content detalle-modal">
        <h3><?php echo htmlspecialchars($receta['titulo']); ?></h3>
        <p><strong>Tipo:</strong> <?php echo htmlspecialchars($receta['tiporeceta']); ?></p>
        <img src="images/<?php echo htmlspecialchars($receta['fotografia']); ?>" alt="Imagen de receta" class="img-modal">
        <p><strong>Preparación:</strong></p>
        <p><?php echo nl2br(htmlspecialchars($receta['preparacion'])); ?></p>
        
        <p><strong>Ingredientes:</strong></p>
        <ul>
            <?php foreach($ingredientes as $ing): ?>
                <li><?php echo $ing; ?></li>
            <?php endforeach; ?>
        </ul>
        <button onclick="cerrarModal()">Cerrar Modal</button>
    </div>
</div>
