<?php
$n_input = isset($_POST['nombres']) ? $_POST['nombres'] : "";
$n_lista = [];
$total_n = 0;

if ($n_input != "") {
    $n_sep = explode(",", $n_input);
    foreach ($n_sep as $n) {
        $n_limpio = trim($n);
        if ($n_limpio != "") {
            $n_cap = ucwords(strtolower($n_limpio));
            $n_lista[] = $n_cap;
            $total_n++;
        }
    }
}

$est = [
    "Juan Perez" => [5, 6, 5, 4],
    "Maria Gomez" => [8, 9, 10, 9],
    "Carlos Ruiz" => [3, 4, 2, 5],
    "Ana Lopez" => [6, 6, 7, 6],
    "Luis Santos" => [10, 10, 9, 10]
];

$proms = [];
$mejor = -1;
$peor = 101;

foreach ($est as $nom => $notas) {
    $suma = 0;
    foreach ($notas as $nota) {
        $suma += $nota;
    }
    $p = $suma / 4;
    $proms[$nom] = $p;

    if ($p > $mejor) {
        $mejor = $p;
    }
    if ($p < $peor) {
        $peor = $p;
    }
}

$txt = isset($_POST['texto']) ? $_POST['texto'] : "";
$pal = isset($_POST['palabra']) ? $_POST['palabra'] : "";
$ocu = 0;
$txt_res = "";

if ($txt != "" && $pal != "") {
    $txt_min = strtolower($txt);
    $pal_min = strtolower($pal);
    $ocu = substr_count($txt_min, $pal_min);
    $txt_res = str_ireplace($pal, "<span class='resaltado'>" . $pal . "</span>", $txt);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados del Reporte</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .seccion {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 20px;
            background-color: white;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        .mejor {
            background-color: #d4edda;
        }
        .peor {
            background-color: #f8d7da;
        }
        .resaltado {
            background-color: yellow;
            font-weight: bold;
            color: red;
        }
        .boton-volver {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <a href="formulario.html" class="boton-volver">Volver a los formularios</a>

    <?php if ($total_n > 0) { ?>
    <div class="seccion">
        <h2>Parte A: Resultados de Nombres</h2>
        <ol>
            <?php foreach ($n_lista as $nombre) { ?>
                <li><?php echo $nombre; ?></li>
            <?php } ?>
        </ol>
        <p>Total procesados: <?php echo $total_n; ?></p>
    </div>
    <?php } ?>

    <div class="seccion">
        <h2>Parte B: Tabla de Calificaciones</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th>Nota 3</th>
                <th>Nota 4</th>
                <th>Promedio</th>
                <th>Estado</th>
            </tr>
            <?php foreach ($est as $nom => $notas) { 
                $p = $proms[$nom];
                
                $clase = "";
                if ($p == $mejor) {
                    $clase = "mejor";
                } elseif ($p == $peor) {
                    $clase = "peor";
                }

                $estado = "Reprobado";
                if ($p >= 6) {
                    $estado = "Aprobado";
                }
            ?>
            <tr class="<?php echo $clase; ?>">
                <td><?php echo $nom; ?></td>
                <td><?php echo $notas[0]; ?></td>
                <td><?php echo $notas[1]; ?></td>
                <td><?php echo $notas[2]; ?></td>
                <td><?php echo $notas[3]; ?></td>
                <td><?php echo $p; ?></td>
                <td><?php echo $estado; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>

    <?php if ($pal != "") { ?>
    <div class="seccion">
        <h2>Parte C: Resultados de Búsqueda</h2>
        <p>Apariciones encontradas: <?php echo $ocu; ?></p>
        <p>Texto con resaltado:</p>
        <div style="border: 1px solid #aaa; padding: 10px; background: #fff;">
            <?php echo $txt_res; ?>
        </div>
    </div>
    <?php } ?>

</body>
</html>


