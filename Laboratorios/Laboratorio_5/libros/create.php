<?php
include('../conexion.php');

$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$isbn = $_POST['isbn'];
$categoria = $_POST['categoria'];
$stock = $_POST['stock'];

$sql = "INSERT INTO libros (titulo, autor, isbn, categoria, stock) VALUES ('$titulo', '$autor', '$isbn', '$categoria', '$stock')";
$consulta = mysqli_query($link, $sql);

if (isset($consulta)) {
    echo "<div class='alert alert-success'>Elemento insertado con exito</div>";
} else {
    echo "<div class='alert alert-danger'>Error al insertar</div>";
}
mysqli_close($link);
?>