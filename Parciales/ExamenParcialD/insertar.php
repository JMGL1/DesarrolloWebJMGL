<?php
require_once 'conexion.php';

// Solo aceptar POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: form-insertar.html');
    exit;
}

$titulo    = trim($_POST['titulo']    ?? '');
$autor     = trim($_POST['autor']     ?? '');
$anio      = (int)($_POST['anio']     ?? 0);
$editorial = trim($_POST['editorial'] ?? '');

// Validación básica
if (!$titulo || !$autor || !$anio || !$editorial) {
    header('Location: form-insertar.html');
    exit;
}

$conn = getConexion();

$stmt = $conn->prepare(
    "INSERT INTO libros (titulo, autor, anio, editorial) VALUES (?, ?, ?, ?)"
);
$stmt->bind_param('ssis', $titulo, $autor, $anio, $editorial);
$stmt->execute();
$stmt->close();
$conn->close();

// Redirigir al listado
header('Location: listar.php');
exit;
?>
