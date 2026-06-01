<?php include('../conexion.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Usuarios Registrados</h2>
    <a href="registro.php" class="btn btn-success mb-3">Nuevo Usuario</a>
    <a href="../index.php" class="btn btn-secondary mb-3">Inicio</a>
    
    <div id="mensaje"></div>

    <table class="table table-bordered">
        <tr class="table-dark">
            <th>Nombre</th>
            <th>Carnet</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
        <?php
        $sql = "SELECT id, nombre, carnet, telefono FROM usuarios";
        $consulta = mysqli_query($link, $sql);
        while ($fila = mysqli_fetch_array($consulta)) {
        ?>
        <tr id="fila_<?php echo $fila['id']; ?>">
            <td><?php echo $fila['nombre']; ?></td>
            <td><?php echo $fila['carnet']; ?></td>
            <td><?php echo $fila['telefono']; ?></td>
            <td>
                <input type="button" class="btn btn-danger btn-sm" value="Eliminar" onclick="eliminarUsuario(<?php echo $fila['id']; ?>)">
            </td>
        </tr>
        <?php
        }
        mysqli_close($link);
        ?>
    </table>
</div>

<script>
function eliminarUsuario(id) {
    if(confirm("¿Seguro que deseas eliminar este usuario?")) {
        var datos = new FormData();
        datos.append("id", id);

        fetch("delete.php", {
            method: "POST",
            body: datos
        })
        .then(respuesta => respuesta.text())
        .then(texto => {
            document.getElementById("mensaje").innerHTML = texto;
            document.getElementById("fila_" + id).style.display = "none";
        });
    }
}
</script>
</body>
</html>