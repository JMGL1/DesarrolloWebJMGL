<?php
include('conexion.php');

$titulo = $_POST['titulo'] ?? '';
$idtiporeceta = $_POST['idtiporeceta'] ?? '';
$preparacion = $_POST['preparacion'] ?? '';
$nuevo = "";

if (isset($_FILES['fotografia']['tmp_name']) && $_FILES['fotografia']['tmp_name'] != "") {
    $nombre_temporal = $_FILES['fotografia']['tmp_name'];
    $nombre_original = $_FILES['fotografia']['name'];
    $partes = explode(".", $nombre_original);
    $extension = end($partes);
    $nuevo = uniqid() . '.' . $extension;
    copy($nombre_temporal, "images/" . $nuevo);
}

$sql = "INSERT INTO recetas (fotografia, titulo, idtiporeceta, preparacion) VALUES (?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);

if ($stmt->execute([$nuevo, $titulo, $idtiporeceta, $preparacion])) {
    echo "registro exitoso";
} else {
    echo "error";
}
?>
