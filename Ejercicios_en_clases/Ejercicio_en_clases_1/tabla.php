<html>
<head>
    <meta http-equiv="Content-Type" content="text/html charset=utf-8">
    <title>Tabla generada</title>
    <style type="text/css">
        body {
            text-align: center;
            font-family: Arial, sans-serif;
        }

        .tabla-centro {
            margin: 0 auto;
            border-collapse: collapse; 
        }
        
        td {
            width: 70px;
            height: 30px;
            text-align: center;
            border: 1px solid #f2cfb3;
        }

        .cabecera-vacia {
            background: #F79646;
            border: 1px solid #FFFFFF;
        }

        .cabecera-arriba {
            background: #F79646;
            color: #FFFFFF;
            font-weight: bold;
            border: 1px solid #FFFFFF;
        }

        .cabecera-izquierda {
            background: #F79646;
            color: #000000; 
            font-weight: bold;
            border: 1px solid #FFFFFF;
        }
    </style>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $operacion = $_POST['operacion'];
    $n = $_POST['n'];

    echo "<h3><b>Tabla de $operacion</b></h3>";

    $matriz = []; 

    for ($i = 0; $i <= $n; $i++) {
        for ($j = 0; $j <= $n; $j++) {
            
            if ($i == 0 && $j == 0) {
                $matriz[$i][$j] = ""; 
            } elseif ($i == 0) {
                $matriz[$i][$j] = $j; 
            } elseif ($j == 0) {
                $matriz[$i][$j] = $i; 
            } else {
                if ($operacion == "Suma") {
                    $matriz[$i][$j] = $i + $j;
                } elseif ($operacion == "Resta") {
                    $matriz[$i][$j] = $i - $j;
                } elseif ($operacion == "Multiplicacion") {
                    $matriz[$i][$j] = $i * $j;
                } elseif ($operacion == "Division") {
                    $matriz[$i][$j] = ($j != 0) ? round($i / $j, 2) : 0; 
                }
            }
        }
    }

    echo "<table class='tabla-centro'>"; 
    for ($i = 0; $i <= $n; $i++) {
        echo "<tr>";
        for ($j = 0; $j <= $n; $j++) {
            
            $valor = $matriz[$i][$j]; 

            if ($i == 0 && $j == 0) {
                echo "<td class='cabecera-vacia'>$valor</td>";
            } elseif ($i == 0) {
                echo "<td class='cabecera-arriba'>$valor</td>";
            } elseif ($j == 0) {
                echo "<td class='cabecera-izquierda'>$valor</td>";
            } else {
                echo "<td>$valor</td>";
            }
            
        }
        echo "</tr>";
    }
    echo "</table>";

} else {
    echo "<p>Por favor, ingresa desde el formulario principal.</p>";
}
?>

</body>
</html>