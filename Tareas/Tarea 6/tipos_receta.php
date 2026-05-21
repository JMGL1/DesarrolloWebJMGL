<?php
include "conexion.php";
$sql = "select id, tiporeceta from tiporeceta";
$stmt = $pdo->query($sql);
$arreglo = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($arreglo);
?>