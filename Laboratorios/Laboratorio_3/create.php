<?php
include('conexion.php');

$nombre = $_POST['nombre'];
$raza = $_POST['raza'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$peso = $_POST['peso'];
$sexo = $_POST['sexo'];
$propietario = $_POST['propietario'];
$especie_id = $_POST['especie_id'];

$nuevo = "";
if (isset($_FILES['fotografia']['tmp_name']) && $_FILES['fotografia']['tmp_name'] != "") {
    $nombre_temporal = $_FILES['fotografia']['tmp_name'];
    $partes = explode(".", $_FILES['fotografia']['name']);
    $extension = end($partes);
    $nuevo = uniqid() . '.' . $extension;
    copy($nombre_temporal, "images/" . $nuevo);
}

$consulta = "insert into mascotas (fotografia,nombre,raza,fecha_nacimiento,peso,sexo,propietario,especie_id) values (?,?,?,?,?,?,?,?)";
$sentencia = $con->prepare($consulta);
$sentencia->bind_param("sssssdsi", $nuevo, $nombre, $raza, $fecha_nacimiento, $peso, $sexo, $propietario, $especie_id);

if ($sentencia->execute()) {
    echo "registro exitoso";
} else {
    echo "Error al registrar: " . $sentencia->error;
}
?>
<meta http-equiv="refresh" content="2;url=read.php">
