<!DOCTYPE html>
<html>
<head>
    <title>Registrar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Registro de Usuario</h2>
    <form id="formUsuario">
        Nombre: <input type="text" name="nombre" class="form-control mb-2">
        Carnet: <input type="text" name="carnet" class="form-control mb-2">
        Teléfono: <input type="text" name="telefono" class="form-control mb-2">
        Correo: <input type="text" name="correo" class="form-control mb-3">
        
        <input type="button" class="btn btn-success" value="Guardar" onclick="guardarUsuario()">
        <a href="lista.php" class="btn btn-secondary">Ver Lista</a>
    </form>
    <div id="mensaje" class="mt-3"></div>
</div>

<script>
function guardarUsuario() {
    var formulario = document.getElementById("formUsuario");
    var datos = new FormData(formulario);

    fetch("create.php", {
        method: "POST",
        body: datos
    })
    .then(respuesta => respuesta.text())
    .then(texto => {
        document.getElementById("mensaje").innerHTML = texto;
        formulario.reset();
    });
}
</script>
</body>
</html>