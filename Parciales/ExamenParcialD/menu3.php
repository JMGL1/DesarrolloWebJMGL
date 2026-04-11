<?php
session_start();
require_once 'calculadora.php';

// Inicializar o recuperar el objeto Calculadora de la sesión
if (!isset($_SESSION['calculadora'])) {
    $_SESSION['calculadora'] = new Calculadora();
}
/** @var Calculadora $calc */
$calc = $_SESSION['calculadora'];

$accion    = $_GET['accion'] ?? '';
$n         = isset($_GET['n']) ? (int)$_GET['n'] : null;
$resultado = '';
$titulo    = '';
$detalle   = '';

// Procesar la acción
switch ($accion) {
    case 'fibonacci':
        if ($n !== null && $n > 0) {
            $res = $calc->fibonacci($n);
            $serie = $calc->serieFibonacci($n + 1);
            $titulo = "Fibonacci($n)";
            $resultado = "El término $n de Fibonacci es: <strong>$res</strong>";
            $detalle = "Serie: " . implode(', ', $serie) . ", ...";
        }
        break;

    case 'factorial':
        if ($n !== null && $n >= 0) {
            $proceso = $calc->procesoFactorial($n);
            $titulo = "Factorial($n)";
            $resultado = "Resultado: <strong>" . $calc->factorial($n) . "</strong>";
            // Remove duplicate history entry
            array_pop($calc->historial);
            $detalle = "Proceso: $proceso";
        }
        break;

    case 'sumatoria':
        if ($n !== null && $n > 0) {
            $res = $calc->sumatoria($n);
            $titulo = "Sumatoria($n)";
            $resultado = "La suma de 1 hasta $n es: <strong>$res</strong>";
        }
        break;

    case 'historial':
        $titulo = "Historial de Operaciones";
        break;

    case 'limpiar':
        $calc->limpiarHistorial();
        $titulo = "Historial Limpiado";
        $resultado = "✅ El historial ha sido borrado.";
        break;
}

// Guardar el objeto actualizado en la sesión
$_SESSION['calculadora'] = $calc;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pregunta 3 – Calculadora</title>
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

    /* Opciones del menú de calculadora */
    .calc-menu {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-bottom: 28px;
    }

    .calc-menu a {
      background: #8E44AD;
      color: #fff;
      padding: 10px 18px;
      text-decoration: none;
      border-radius: 6px;
      font-weight: bold;
      font-size: 14px;
      transition: background 0.2s;
    }

    .calc-menu a:hover { background: #6C3483; }
    .calc-menu a.danger { background: #E74C3C; }
    .calc-menu a.danger:hover { background: #C0392B; }
    .calc-menu a.secondary { background: #2C3E50; }
    .calc-menu a.secondary:hover { background: #1A252F; }

    /* Formulario de ingreso de n */
    .form-n {
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 24px;
      max-width: 420px;
    }

    .form-n h3 {
      color: #8E44AD;
      margin-bottom: 14px;
      font-size: 16px;
    }

    .form-n label {
      display: block;
      font-weight: bold;
      font-size: 14px;
      margin-bottom: 6px;
      color: #333;
    }

    .form-n input[type="number"] {
      width: 100%;
      padding: 10px 14px;
      border: 2px solid #8E44AD;
      border-radius: 6px;
      font-size: 15px;
      outline: none;
      margin-bottom: 14px;
    }

    .form-n button {
      background: #8E44AD;
      color: #fff;
      padding: 10px 24px;
      border: none;
      border-radius: 6px;
      font-size: 14px;
      font-weight: bold;
      cursor: pointer;
    }

    .form-n button:hover { background: #6C3483; }

    /* Resultado */
    .resultado-box {
      background: #fff;
      border-left: 4px solid #8E44AD;
      padding: 16px 20px;
      border-radius: 0 8px 8px 0;
      margin-bottom: 24px;
    }

    .resultado-box h3 {
      color: #8E44AD;
      margin-bottom: 10px;
      font-size: 16px;
    }

    .resultado-box p {
      font-size: 15px;
      color: #333;
      margin-bottom: 6px;
      line-height: 1.5;
    }

    /* Tabla historial */
    .tabla-historial {
      width: 100%;
      border-collapse: collapse;
      font-size: 14px;
    }

    .tabla-historial th {
      background: #8E44AD;
      color: #fff;
      padding: 10px 14px;
      text-align: center;
    }

    .tabla-historial td {
      padding: 10px 14px;
      text-align: center;
      border-bottom: 1px solid #eee;
    }

    .tabla-historial tr:nth-child(even) td { background: #F4ECF7; }
    .tabla-historial tr:hover td { background: #D2B4DE; }

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
      <h2>Pregunta 3: Clase Calculadora</h2>

      <!-- Menú de opciones -->
      <div class="calc-menu">
        <a href="menu3.php?accion=fibonacci_form">🔢 Fibonacci</a>
        <a href="menu3.php?accion=factorial_form">❗ Factorial</a>
        <a href="menu3.php?accion=sumatoria_form">➕ Sumatoria</a>
        <a href="menu3.php?accion=historial" class="secondary">📋 Ver Historial</a>
        <a href="menu3.php?accion=limpiar" class="danger">🗑️ Limpiar Historial</a>
      </div>

      <?php
        // Mostrar formulario de ingreso de n
        $mostrarForm = in_array($accion, ['fibonacci_form', 'factorial_form', 'sumatoria_form']);
        $labels = [
          'fibonacci_form' => ['Fibonacci', 'Ingresa n para calcular el n-ésimo número de Fibonacci:', 'fibonacci'],
          'factorial_form' => ['Factorial', 'Ingresa n para calcular el factorial de n:', 'factorial'],
          'sumatoria_form' => ['Sumatoria', 'Ingresa n para calcular la suma de 1 a n:', 'sumatoria'],
        ];
        if ($mostrarForm && isset($labels[$accion])):
          [$label, $desc, $act] = $labels[$accion];
      ?>
      <div class="form-n">
        <h3><?= $label ?></h3>
        <form action="menu3.php" method="GET">
          <input type="hidden" name="accion" value="<?= $act ?>">
          <label for="n"><?= $desc ?></label>
          <input type="number" id="n" name="n" min="0" placeholder="Ej: 7" required>
          <button type="submit">Calcular</button>
        </form>
      </div>
      <?php endif; ?>

      <?php if ($titulo && $accion !== 'historial' && $accion !== 'limpiar'): ?>
      <div class="resultado-box">
        <h3><?= htmlspecialchars($titulo) ?></h3>
        <?php if ($resultado): ?><p><?= $resultado ?></p><?php endif; ?>
        <?php if ($detalle): ?><p style="color:#666; font-size:14px;"><?= htmlspecialchars($detalle) ?></p><?php endif; ?>
      </div>
      <?php endif; ?>

      <?php if ($accion === 'limpiar'): ?>
      <div class="resultado-box" style="border-color:#E74C3C;">
        <p><?= $resultado ?></p>
      </div>
      <?php endif; ?>

      <?php if ($accion === 'historial'): ?>
      <div style="margin-bottom: 16px;">
        <h3 style="color:#8E44AD; margin-bottom: 14px;">📋 Historial de Operaciones</h3>
        <?= $calc->mostrarHistorial() ?>
      </div>
      <?php endif; ?>

    </div>

    <nav class="sidebar">
      <a href="inicio.html">Inicio</a>
      <a href="pregunta2.html">Pregunta 2</a>
      <a href="menu3.php" class="active">Pregunta 3</a>
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
