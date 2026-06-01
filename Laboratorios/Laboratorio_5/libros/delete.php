<?php
include('../conexion.php');
$id = $_POST['id'];

$sql = "DELETE FROM libros WHERE id = $id";
$consulta = mysqli_query($link, $sql);

if (isset($consulta)) {
    echo "<div class='alert alert-warning'>Elemento eliminado con exito</div>";
}
mysqli_close($link);
?>