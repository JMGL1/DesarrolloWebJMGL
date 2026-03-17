<?php
include("pila.php"); 
session_start(); 

if (!isset($_SESSION['p'])) {
    $_SESSION['p'] = new Pila(10);
}

$elemento = $_GET["elemento"];
$exito = $_SESSION['p']->insertar($elemento);

if ($exito) {
    echo "<h3>Elemento insertado: " . $elemento . "</h3>";
} else {
    echo "<h3 style='color:red;'>Error: La pila está  llena (Stack Overflow).</h3>";
}

echo "<p>Regresando al menú en 3 segundos...</p>";
?>
<meta http-equiv="refresh" content="3; url=menu.html">