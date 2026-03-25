<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos Recibidos</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .error { color: #D8000C; background-color: #FFBABA; padding: 15px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #D8000C; }
        .exito { color: #4F8A10; background-color: #DFF2BF; padding: 15px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #4F8A10; }
        table { border-collapse: collapse; width: 60%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; width: 30%; }
    </style>
</head>
<body>

<?php
$metodo = $_SERVER['REQUEST_METHOD'];
echo "<h2>Procesamiento de Formulario</h2>";
echo "<p>Método utilizado para enviar los datos: <strong>" . $metodo . "</strong></p>";


$datos = ($metodo === 'POST') ? $_POST : $_GET;


$errores = [];
$nombre = $correo = $carrera = $semestre = $turno = $comentarios = "";
$materias = [];


function sanearDato($dato) {
    $dato = trim($dato); 
    $dato = stripslashes($dato); 
    $dato = htmlspecialchars($dato); 
    return $dato;
}

if (isset($datos['nombre'])) {
    $nombre = sanearDato($datos['nombre']);
}
if (isset($datos['correo'])) {
    $correo = sanearDato($datos['correo']);
}
if (isset($datos['carrera'])) {
    $carrera = sanearDato($datos['carrera']);
}
if (isset($datos['semestre']) && $datos['semestre'] !== '') {
    $semestre = (int) sanearDato($datos['semestre']);
}
if (isset($datos['turno'])) {
    $turno = sanearDato($datos['turno']);
}
if (isset($datos['materias']) && is_array($datos['materias'])) {
    foreach ($datos['materias'] as $materia) {
        $materias[] = sanearDato($materia);
    }
}
if (isset($datos['comentarios'])) {
    $comentarios = sanearDato($datos['comentarios']);
}

if (empty($nombre)) {
    $errores[] = "El campo 'Nombre completo' es obligatorio y no puede estar vacío.";
}
if ($semestre === "" || $semestre < 1 || $semestre > 10) {
    $errores[] = "El semestre debe ser un valor numérico entre 1 y 10.";
}

if (!empty($errores)) {
    echo "<div class='error'>";
    echo "<h3>Se encontraron los siguientes errores:</h3>";
    echo "<ul>";
    foreach ($errores as $error) {
        echo "<li>" . $error . "</li>";
    }
    echo "</ul>";
    echo "</div>";
    echo "<p><a href='registro.html'>Volver al formulario</a></p>";
} else {
    echo "<div class='exito'>¡Los datos se procesaron y validaron correctamente!</div>";
    
    $listaMaterias = !empty($materias) ? implode(", ", $materias) : "Ninguna seleccionada";
    
    echo "<table>";
    echo "<tr><th>Nombre Completo</th><td>" . $nombre . "</td></tr>";
    echo "<tr><th>Correo Electrónico</th><td>" . ($correo !== '' ? $correo : "No proporcionado") . "</td></tr>";
    echo "<tr><th>Carrera</th><td>" . ($carrera !== '' ? $carrera : "No seleccionada") . "</td></tr>";
    echo "<tr><th>Semestre</th><td>" . $semestre . "</td></tr>";
    echo "<tr><th>Turno</th><td>" . ($turno !== '' ? $turno : "No seleccionado") . "</td></tr>";
    echo "<tr><th>Materias de Interés</th><td>" . $listaMaterias . "</td></tr>";
    echo "<tr><th>Comentarios</th><td>" . ($comentarios !== '' ? $comentarios : "Sin comentarios") . "</td></tr>";
    echo "</table>";
    
    echo "<br><p><a href='registro.html'>Volver a registrar</a></p>";
}
?>

</body>
</html>