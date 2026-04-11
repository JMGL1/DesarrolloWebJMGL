<?php
require_once 'conexion.php';
$conn = getConexion();

// Eliminar libro si se recibe el parámetro id
if (isset($_GET['eliminar'])) {
    $id = (int)$_GET['eliminar'];
    $stmt = $conn->prepare("DELETE FROM libros WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
    header('Location: listar.php');
    exit;
}

// Obtener todos los libros
$resultado = $conn->query("SELECT * FROM libros ORDER BY id");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pregunta 4 – Listado de Libros</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      background: #e8e8e8;
      display: flex;
      justify-content: center;
      font-family: Arial, sans-serif;
    }

    .wrapper {
      width: 900px;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    header {
      background: #2C3E50;
      height: 120px;
      display: flex;
      align-items: center;
      padding: 0 20px;
      gap: 20px;
    }

    header .escudo {
      width: 80px; height: 80px;
      background: #fff;
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0;
    }

    header .escudo span { font-size: 11px; color: #2C3E50; font-weight: bold; }
    header .header-text { color: #fff; }
    header .header-text h1 { font-size: 18px; font-weight: bold; }
    header .header-text p { font-size: 14px; margin-top: 4px; opacity: 0.85; }

    .zona-central { display: flex; flex: 1; }

    .contenido-principal {
      flex: 1;
      background: #F4ECF7;
      padding: 30px;
      min-height: 300px;
    }

    h2 {
      color: #8E44AD;
      font-size: 20px;
      margin-bottom: 20px;
      border-bottom: 2px solid #8E44AD;
      padding-bottom: 8px;
    }

    .toolbar {
      display: flex;
      justify-content: flex-end;
      margin-bottom: 16px;
    }

    .btn-nuevo {
      background: #27AE60;
      color: #fff;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 6px;
      font-weight: bold;
      font-size: 14px;
      transition: background 0.2s;
    }

    .btn-nuevo:hover { background: #1E8449; }

    table.tabla-libros {
      width: 100%;
      border-collapse: collapse;
      font-size: 14px;
    }

    table.tabla-libros thead tr {
      background: #8E44AD;
      color: #fff;
    }

    table.tabla-libros th {
      padding: 12px 14px;
      text-align: left;
    }

    table.tabla-libros td {
      padding: 11px 14px;
      border-bottom: 1px solid #ddd;
    }

    /* Filas intercaladas: #F4ECF7 y blanco */
    table.tabla-libros tbody tr:nth-child(odd) td {
      background: #F4ECF7;
    }

    table.tabla-libros tbody tr:nth-child(even) td {
      background: #ffffff;
    }

    table.tabla-libros tbody tr:hover td {
      background: #D2B4DE;
    }

    .btn-eliminar {
      color: #E74C3C;
      text-decoration: underline;
      font-weight: bold;
      font-size: 13px;
      cursor: pointer;
    }

    .btn-eliminar:hover { color: #C0392B; }

    .no-datos {
      text-align: center;
      padding: 30px;
      color: #888;
      font-style: italic;
    }

    .sidebar {
      width: 200px;
      flex-shrink: 0;
      background: #8E44AD;
      display: flex;
      flex-direction: column;
    }

    .sidebar a {
      display: flex;
      align-items: center;
      padding: 18px 20px;
      color: #fff;
      text-decoration: none;
      font-size: 14px;
      font-weight: bold;
      border-left: 4px solid transparent;
      transition: background 0.2s, border-color 0.2s;
    }

    .sidebar a:hover {
      background: #D2B4DE;
      color: #2C3E50;
      border-left: 4px solid #2C3E50;
    }

    .sidebar a.active {
      background: #6C3483;
      border-left: 4px solid #fff;
    }

    footer {
      background: #1A1A2E;
      color: #ccc;
      display: flex;
      justify-content: space-around;
      align-items: center;
      padding: 16px 20px;
      font-size: 13px;
    }
  </style>
</head>
<body>
<div class="wrapper">

  <header>
    <div class="escudo"><span>Escudo</span></div>
    <div class="header-text">
      <h1>UNIVERSIDAD DE SAN FRANCISCO XAVIER</h1>
      <p>Primer Examen Parcial – SIS 256</p>
    </div>
  </header>

  <div class="zona-central">
    <div class="contenido-principal">
      <h2>Pregunta 4: Listado de Libros</h2>

      <div class="toolbar">
        <a href="form-insertar.html" class="btn-nuevo">+ Nuevo Libro</a>
      </div>

      <table class="tabla-libros">
        <thead>
          <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Año</th>
            <th>Editorial</th>
            <th>Operación</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($resultado && $resultado->num_rows > 0): ?>
            <?php while ($fila = $resultado->fetch_assoc()): ?>
            <tr>
              <td><?= htmlspecialchars($fila['titulo']) ?></td>
              <td><?= htmlspecialchars($fila['autor']) ?></td>
              <td><?= htmlspecialchars($fila['anio']) ?></td>
              <td><?= htmlspecialchars($fila['editorial']) ?></td>
              <td>
                <a class="btn-eliminar"
                   href="listar.php?eliminar=<?= (int)$fila['id'] ?>"
                   onclick="return confirm('¿Eliminar el libro <?= addslashes(htmlspecialchars($fila['titulo'])) ?>?')">
                  Eliminar
                </a>
              </td>
            </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr>
              <td colspan="5" class="no-datos">No hay libros registrados. <a href="form-insertar.html">Agregar uno</a>.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <nav class="sidebar">
      <a href="inicio.html">Inicio</a>
      <a href="pregunta2.html">Pregunta 2</a>
      <a href="menu3.php">Pregunta 3</a>
      <a href="listar.php" class="active">Pregunta 4</a>
    </nav>
  </div>

  <footer>
    <span>Gestión 1-2026</span>
    <span>SIS 256</span>
    <span>USFX</span>
  </footer>

</div>
</body>
</html>
<?php $conn->close(); ?>
