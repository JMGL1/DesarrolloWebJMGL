<!DOCTYPE html>
<html>
<head>
    <title>Registrar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Registro de Libro</h2>
    <form id="formLibro">
        Título: <input type="text" name="titulo" class="form-control mb-2">
        Autor: <input type="text" name="autor" class="form-control mb-2">
        ISBN: <input type="text" name="isbn" class="form-control mb-2">
        Categoría: <input type="text" name="categoria" class="form-control mb-2">
        Stock: <input type="text" name="stock" class="form-control mb-3" value="1">
        
        <input type="button" class="btn btn-primary" value="Guardar" onclick="guardarLibro()">
        <a href="lista.php" class="btn btn-secondary">Ver Lista</a>
    </form>
    <div id="mensaje" class="mt-3"></div>
</div>

<script>
// Usando Fetch API de forma sencilla para estudiante
function guardarLibro() {
    var formulario = document.getElementById("formLibro");
    var datos = new FormData(formulario);

    fetch("create.php", {
        method: "POST",
        body: datos
    })
    .then(respuesta => respuesta.text())
    .then(texto => {
        document.getElementById("mensaje").innerHTML = texto;
        formulario.reset(); // Limpia el formulario
    });
}
</script>
</body>
</html>