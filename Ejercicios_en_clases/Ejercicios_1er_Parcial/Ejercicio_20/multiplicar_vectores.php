<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado - Multiplicación de Vectores</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>

<div class="contenedor-principal">
            <div class="banner">
        <div class="logo-usfx">
            <img src="../escudo_usfx.gif" alt="Escudo USFX" style="max-width: 100%; max-height: 100%; border-radius: 10px;">
        </div>
        <div class="titulos-banner">
            <h1>UNIVERSIDAD DE SAN FRANCISCO XAVIER</h1>
            <h2>FACULTAD DE TECNOLOGÍA</h2>
            <h3>Carrera Ing en ciencias de la computacion<br>Semestre 1-2026</h3>
        </div>
        <div class="sucre-bolivia">
            <span class="rojo">SUCRE</span> -
            <span class="amarillo">Bolivia</span>
        </div>
    </div>

    <div class="cuerpo">
                <div class="menu-lateral">
            <ul>
                <li><a href="../index.html">Inicio</a></li>
                <li><a href="../Ejercicio_3/form_area.html">Ejercicio 3</a></li>
                <li><a href="../Ejercicio_4/form_dia.html">Ejercicio 4</a></li>
                <li><a href="../Ejercicio_5/form_par_impar.html">Ejercicio 5</a></li>
                <li><a href="../Ejercicio_6/form_mostrar.html">Ejercicio 6</a></li>
                <li><a href="../Ejercicio_14/ejercicio14_menu.html">Ejercicio 14</a></li>
                <li><a href="../Ejercicio_15/pregunta2.html">Ejercicio 15</a></li>
                <li><a href="../Ejercicio_16/pregunta3_16.html">Ejercicio 16</a></li>
                <li><a href="../Ejercicio_17/pregunta4.html">Ejercicio 17</a></li>
                <li><a href="../Ejercicio_18/form_login.html">Ejercicio 18</a></li>
                <li><a href="../Ejercicio_19/form_cookie19.html">Ejercicio 19</a></li>
                <li><a href="../Ejercicio_20/form_vectores.html">Ejercicio 20</a></li>
            </ul>
        </div>

        <div class="contenido">
            <h2>Resultado del Producto Vectorial</h2>
            <div class="formulario-box">
                <?php
                if (isset($_POST['v1']) && isset($_POST['v2'])) {
                    $v1 = $_POST['v1'];
                    $v2 = $_POST['v2'];
                    $n = isset($_SESSION['n_vector']) ? $_SESSION['n_vector'] : count($v1);
                    
                    if (count($v1) == count($v2) && count($v1) == $n) {
                        $resultado = 0;
                        echo "<p>Vector 1 = [" . implode(", ", $v1) . "]</p>";
                        echo "<p>Vector 2 = [" . implode("]<br>[", $v2) . "]</p>";
                        
                        for ($i = 0; $i < $n; $i++) {
                            $resultado += $v1[$i] * $v2[$i];
                        }
                        
                        echo "<h3>El resultado (producto punto) es: <b>$resultado</b></h3>";
                    } else {
                        echo "<p style='color:red;'>Los tamaños de los vectores no coinciden.</p>";
                    }
                    
                } else {
                    echo "<p style='color:red;'>Faltan datos de los vectores.</p>";
                }
                ?>
                <br>
                <a href="vectores_n.php">Volver a los vectores</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
