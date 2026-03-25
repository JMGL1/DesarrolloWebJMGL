<?php
$texto = " Hola Mundo desde PHP ";
echo "<p>Original: [" . $texto . "]</p>";
echo "<p>Sin espacios: [" . trim($texto) . "]</p>";
echo "<p>Mayúsculas: " . strtoupper($texto) . "</p>";
echo "<p>Minúsculas: " . strtolower($texto) . "</p>";
echo "<p>Longitud: " . strlen(trim($texto)) . " caracteres</p>";
echo "<p>Invertido: " . strrev(trim($texto)) . "</p>";
echo "<p>Reemplazar: " . str_replace("PHP", "el servidor", trim($texto)) .
"</p>";
echo "<p>Posición de 'Mundo': " . strpos($texto, "Mundo") . "</p>";
echo "<p>Subcadena: " . substr(trim($texto), 5, 5) . "</p>";
?>