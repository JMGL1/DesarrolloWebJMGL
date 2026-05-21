<?php
require 'conexion.php';

$sql = "SELECT id, tiporeceta FROM tiporeceta";
$stmt = $pdo->query($sql);
$tipos = $stmt->fetchAll();

header('Content-Type: application/json');
echo json_encode($tipos);
?>
