<?php
  $cadena1 = strtoupper(trim($_GET['cadena1'] ?? ''));
  $cadena2 = strtoupper(trim($_GET['cadena2'] ?? ''));

  // Encontrar la primera letra en común
  $pos1 = -1;
  $pos2 = -1;
  $letraComun = '';

  for ($i = 0; $i < strlen($cadena1); $i++) {
    for ($j = 0; $j < strlen($cadena2); $j++) {
      if ($cadena1[$i] === $cadena2[$j]) {
        $pos1 = $i;  // columna de la intersección (posición en cadena1)
        $pos2 = $j;  // fila de la intersección (posición en cadena2)
        $letraComun = $cadena1[$i];
        break 2;
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado – Cruzar Cadenas</title>
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
      width: 80px;
      height: 80px;
      background: #fff;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
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
      margin-bottom: 16px;
      border-bottom: 2px solid #8E44AD;
      padding-bottom: 8px;
    }

    .info-box {
      background: #fff;
      border-left: 4px solid #8E44AD;
      padding: 12px 16px;
      margin-bottom: 24px;
      border-radius: 0 6px 6px 0;
      font-size: 14px;
      color: #333;
    }

    .no-comun {
      background: #FDEDEC;
      border-left: 4px solid #E74C3C;
      padding: 16px 20px;
      border-radius: 0 8px 8px 0;
      font-size: 16px;
      font-weight: bold;
      color: #C0392B;
    }

    /* Tabla de palabras cruzadas */
    table.cruzada {
      border-collapse: collapse;
      margin: 0 auto;
    }

    table.cruzada td {
      width: 48px;
      height: 48px;
      border: 1px solid #ccc;
      text-align: center;
      vertical-align: middle;
      font-size: 20px;
      font-weight: bold;
    }

    .celda-vacia {
      background: #fff;
    }

    .celda-cadena1 {
      background: #8E44AD;
      color: #fff;
    }

    .celda-cadena2 {
      background: #F39C12;
      color: #fff;
    }

    .celda-interseccion {
      background: #E74C3C;
      color: #fff;
    }

    .volver {
      display: inline-block;
      margin-top: 24px;
      background: #8E44AD;
      color: #fff;
      padding: 10px 22px;
      text-decoration: none;
      border-radius: 6px;
      font-weight: bold;
      font-size: 14px;
    }

    .volver:hover { background: #6C3483; }

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

    .leyenda {
      display: flex;
      gap: 20px;
      margin-bottom: 20px;
      flex-wrap: wrap;
    }

    .leyenda-item {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 13px;
    }

    .leyenda-color {
      width: 20px;
      height: 20px;
      border-radius: 3px;
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
      <h2>Resultado: Palabras Cruzadas</h2>

      <div class="info-box">
        <strong>Cadena 1 (horizontal):</strong> <?= htmlspecialchars($cadena1) ?> &nbsp;|&nbsp;
        <strong>Cadena 2 (vertical):</strong> <?= htmlspecialchars($cadena2) ?>
      </div>

      <?php if ($pos1 === -1): ?>
        <div class="no-comun">No existen letras comunes</div>
      <?php else: ?>

        <div class="info-box">
          La letra en común es <strong>"<?= $letraComun ?>"</strong>
          (posición <?= $pos1 + 1 ?> en <?= htmlspecialchars($cadena1) ?>,
           posición <?= $pos2 + 1 ?> en <?= htmlspecialchars($cadena2) ?>)
        </div>

        <div class="leyenda">
          <div class="leyenda-item">
            <div class="leyenda-color" style="background:#8E44AD;"></div>
            <span><?= htmlspecialchars($cadena1) ?> (horizontal)</span>
          </div>
          <div class="leyenda-item">
            <div class="leyenda-color" style="background:#F39C12;"></div>
            <span><?= htmlspecialchars($cadena2) ?> (vertical)</span>
          </div>
          <div class="leyenda-item">
            <div class="leyenda-color" style="background:#E74C3C;"></div>
            <span>Intersección "<?= $letraComun ?>"</span>
          </div>
        </div>

        <?php
          // Dimensiones: filas = len(cadena2), columnas = len(cadena1)
          $filas = strlen($cadena2);
          $cols  = strlen($cadena1);
          // La fila de cadena1 es pos2 (índice en cadena2 de la letra común)
          // La columna de cadena2 es pos1 (índice en cadena1 de la letra común)
        ?>
        <table class="cruzada">
          <?php for ($r = 0; $r < $filas; $r++): ?>
          <tr>
            <?php for ($c = 0; $c < $cols; $c++): ?>
              <?php
                if ($r === $pos2 && $c === $pos1) {
                  // Intersección
                  echo "<td class='celda-interseccion'>" . htmlspecialchars($letraComun) . "</td>";
                } elseif ($r === $pos2) {
                  // Fila de cadena1 horizontal
                  echo "<td class='celda-cadena1'>" . htmlspecialchars($cadena1[$c]) . "</td>";
                } elseif ($c === $pos1) {
                  // Columna de cadena2 vertical
                  echo "<td class='celda-cadena2'>" . htmlspecialchars($cadena2[$r]) . "</td>";
                } else {
                  echo "<td class='celda-vacia'></td>";
                }
              ?>
            <?php endfor; ?>
          </tr>
          <?php endfor; ?>
        </table>

      <?php endif; ?>

      <a class="volver" href="pregunta2.html">← Volver al formulario</a>
    </div>

    <nav class="sidebar">
      <a href="inicio.html">Inicio</a>
      <a href="pregunta2.html" class="active">Pregunta 2</a>
      <a href="menu3.php">Pregunta 3</a>
      <a href="listar.php">Pregunta 4</a>
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
