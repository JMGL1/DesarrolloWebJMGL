<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos Procesados</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="contenedor">
        <?php
        // Detección de método y captura de datos
        $metodo = $_SERVER['REQUEST_METHOD'];
        echo "<h2>Datos recibidos mediante: <strong>" . $metodo . "</strong></h2>";
        $datos = ($metodo === 'POST') ? $_POST : $_GET;

        // Función de saneamiento
        function sanear($dato) {
            return htmlspecialchars(trim($dato));
        }

        $nombre = isset($datos['nombre']) ? sanear($datos['nombre']) : "";
        $correo = isset($datos['correo']) ? sanear($datos['correo']) : "";
        $carrera = isset($datos['carrera']) ? sanear($datos['carrera']) : "";
        $semestre = isset($datos['semestre']) ? sanear($datos['semestre']) : "";
        $turno = isset($datos['turno']) ? sanear($datos['turno']) : "No seleccionado";
        $comentarios = isset($datos['comentarios']) ? sanear($datos['comentarios']) : "";

        $materias = [];
        if (isset($datos['materias']) && is_array($datos['materias'])) {
            foreach ($datos['materias'] as $m) { $materias[] = sanear($m); }
        }
        $materias_texto = empty($materias) ? "Ninguna seleccionada" : implode(", ", $materias);

        // Validaciones
        $errores = [];
        if (empty($nombre)) { $errores[] = "El campo 'Nombre completo' no puede estar vacío."; }
        if ($semestre === "" || !is_numeric($semestre) || $semestre < 1 || $semestre > 10) { 
            $errores[] = "El semestre debe ser un número entre 1 y 10."; 
        }

        if (count($errores) > 0) {
            echo "<div class='error'><h3>Errores encontrados:</h3><ul>";
            foreach ($errores as $e) { echo "<li>" . $e . "</li>"; }
            echo "</ul></div>";
        } else {
            echo "<table>";
            echo "<tr><th>Nombre</th><td>" . $nombre . "</td></tr>";
            echo "<tr><th>Correo</th><td>" . $correo . "</td></tr>";
            echo "<tr><th>Carrera</th><td>" . $carrera . "</td></tr>";
            echo "<tr><th>Semestre</th><td>" . $semestre . "</td></tr>";
            echo "<tr><th>Turno</th><td>" . $turno . "</td></tr>";
            echo "<tr><th>Materias</th><td>" . $materias_texto . "</td></tr>";
            echo "<tr><th>Comentarios</th><td>" . $comentarios . "</td></tr>";
            echo "</table>";
        }
        ?>
        <br><a href="registro.html"><button>Volver al Formulario</button></a>
    </div>
</body>
</html>