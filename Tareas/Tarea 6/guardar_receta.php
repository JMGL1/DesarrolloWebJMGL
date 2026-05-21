<?php
require 'conexion.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'] ?? '';
    $idtiporeceta = $_POST['idtiporeceta'] ?? '';
    $preparacion = $_POST['preparacion'] ?? '';
    $fotografia = $_POST['fotografia'] ?? '';

    if (empty($titulo) || empty($idtiporeceta) || empty($preparacion) || empty($fotografia)) {
        echo json_encode(['success' => false, 'message' => 'Faltan datos']);
        exit;
    }

    $sql = "INSERT INTO recetas (titulo, idtiporeceta, preparacion, fotografia) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    try {
        $stmt->execute([$titulo, $idtiporeceta, $preparacion, $fotografia]);
        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
?>
