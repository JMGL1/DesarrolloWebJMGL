<?php
include "conexion.php";
$id = $_GET['id'];

$consulta_foto = "SELECT fotografia FROM mascotas WHERE id = ?";
$sentencia_foto = $con->prepare($consulta_foto);
$sentencia_foto->bind_param("i", $id);
$sentencia_foto->execute();
$resultado_foto = $sentencia_foto->get_result();

if ($fila = $resultado_foto->fetch_assoc()) {
    $fotografia = $fila['fotografia'];
    if (!empty($fotografia) && file_exists('images/' . $fotografia)) {
        unlink('images/' . $fotografia); 
    }
}

$consulta = "delete from mascotas where id=?";
$sentencia = $con->prepare($consulta);
$sentencia->bind_param("i", $id);

if($sentencia->execute())
{
    echo "Se elimino el registro";
} else {
    echo "Error al eliminar: " . $sentencia->error;
}
?>
<meta http-equiv="refresh" content="2;url=read.php">
