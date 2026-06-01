<?php include('../conexion.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Libros Registrados</h2>
    <a href="registro.php" class="btn btn-primary mb-3">Nuevo Libro</a>
    <a href="../index.php" class="btn btn-secondary mb-3">Inicio</a>
    
    <div id="mensaje"></div>

    <table class="table table-bordered">
        <tr class="table-dark">
            <th>Título</th>
            <th>Autor</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
        <?php
        $sql = "SELECT id, titulo, autor, stock FROM libros";
        $consulta = mysqli_query($link, $sql);
        while ($fila = mysqli_fetch_array($consulta)) {
        ?>
        <tr id="fila_<?php echo $fila['id']; ?>">
            <td><?php echo $fila['titulo']; ?></td>
            <td><?php echo $fila['autor']; ?></td>
            <td><?php echo $fila['stock']; ?></td>
            <td>
                <input type="button" class="btn btn-danger btn-sm" value="Eliminar" onclick="eliminarLibro(<?php echo $fila['id']; ?>)">
            </td>
        </tr>
        <?php
        }
        mysqli_close($link);
        ?>
    </table>
</div>

<script>
function eliminarLibro(id) {
    if(confirm("¿Seguro que deseas eliminar este libro?")) {
        var datos = new FormData();
        datos.append("id", id);

        fetch("delete.php", {
            method: "POST",
            body: datos
        })
        .then(respuesta => respuesta.text())
        .then(texto => {
            document.getElementById("mensaje").innerHTML = texto;
            // Ocultamos la fila directamente manipulando el DOM
            document.getElementById("fila_" + id).style.display = "none";
        });
    }
}
</script>
</body>
</html>