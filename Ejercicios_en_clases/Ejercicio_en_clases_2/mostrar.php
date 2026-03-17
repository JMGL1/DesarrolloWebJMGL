<?php
include("pila.php");
session_start();

if (!isset($_SESSION['p'])) {
    $_SESSION['p'] = new Pila(10);
}

echo "<h2>Elementos actuales en la  Pila:</h2>";

$_SESSION['p']->mostrar();

echo "<p>Regresando al menú en 5 segundos...</p>";
?>
<meta http-equiv="refresh" content="5; url=menu.html">