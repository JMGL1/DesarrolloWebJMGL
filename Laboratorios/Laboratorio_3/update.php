<?php
include("conexion.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$raza = $_POST['raza'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$peso = $_POST['peso'];
$sexo = $_POST['sexo'];
$propietario = $_POST['propietario'];
$especie_id = $_POST['especie_id'];

$nuevo = $_POST['fotografia_actual']; // Mantiene la foto actual por defecto

if (isset($_FILES['fotografia']['tmp_name']) && $_FILES['fotografia']['tmp_name'] != "") {
    $nombre_temporal = $_FILES['fotografia']['tmp_name'];
    $partes = explode(".", $_FILES['fotografia']['name']);
    $extension = end($partes);
    $nuevo = uniqid() . '.' . $extension;
    copy($nombre_temporal, "images/" . $nuevo);
}

$consulta = "update mascotas set fotografia=?, nombre=?, raza=?, fecha_nacimiento=?, peso=?, sexo=?, propietario=?, especie_id=? where id=?";
$sentencia = $con->prepare($consulta);
$sentencia->bind_param("sssssdsii", $nuevo, $nombre, $raza, $fecha_nacimiento, $peso, $sexo, $propietario, $especie_id, $id);

if($sentencia->execute())
{
    echo "actualización exitosa";
} else {
    echo "Error al actualizar: " . $sentencia->error;
}
?>
<meta http-equiv="refresh" content="2;url=read.php">
