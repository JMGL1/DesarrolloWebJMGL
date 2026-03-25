<?php
$numero = 7;
echo "<h3>Tabla del " . $numero . "</h3>";
echo "<ul>";
for ($i = 1; $i <= 10; $i++) {
$resultado = $numero * $i;
echo "<li>" . $numero . " x " . $i . " = " . $resultado . "</li>";
}
echo "</ul>";
?>
<?php
$contador = 5;
echo "<p>Cuenta regresiva: ";
while ($contador > 0) {
echo $contador . "... ";
$contador--;
}
echo "¡Despegue!</p>";
?>
<?php
$frutas = ["manzana", "banana", "naranja", "uva"];
echo "<h3>Lista de frutas:</h3><ol>";
foreach ($frutas as $fruta) {
echo "<li>" . ucfirst($fruta) . "</li>";
}
echo "</ol>";
?>