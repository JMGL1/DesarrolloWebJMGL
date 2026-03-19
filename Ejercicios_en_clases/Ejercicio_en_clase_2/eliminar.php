<?php
include("pila.php");
session_start();

if (!isset($_SESSION['p'])) {
    $_SESSION['p'] = new Pila(10);
}

$valor = $_SESSION['p']->eliminar();

if ($valor !== null) {
    echo "<h3>Elemento eliminado de la pila: <span style='color:blue;'>" . $valor . "</span></h3>";
} else {
    echo "<h3 style='color:red;'>Error: La pila ya está vacía (Stack Underflow).</h3>";
}

echo "<p>Regresando al menú en 3 segundos...</p>";
?>
<meta http-equiv="refresh" content="3; url=menu.html">