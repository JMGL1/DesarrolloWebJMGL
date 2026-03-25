<?php
    // Variables de distintos tipos
    $nombre = "Juan Pérez";
    $edad = 22;
    $promedio = 8.75;
    $activo = true;
    // Mostrar en pantalla
    echo "<h2>Hola, " . $nombre . "</h2>";
    echo "<p>Edad: " . $edad . " años</p>";
    echo "<p>Promedio: " . $promedio . "</p>";
    echo "<p>Estado: " . ($activo ? 'Activo' : 'Inactivo') . "</p>";
?>