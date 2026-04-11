<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado - Cookie</title>
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
            <h2>Resultado de la Operación (Cookie)</h2>
            <div class="formulario-box">
                <?php
                if (isset($_COOKIE['numero_ej19']) && isset($_GET['opcion'])) {
                    $n = intval($_COOKIE['numero_ej19']);
                    $opcion = $_GET['opcion'];
                    
                    echo "<p>Valor recuperado de la cookie: <b>$n</b></p>";
                    
                    if ($opcion == 'sumatoria') {
                        $suma = 0;
                        for ($i = 1; $i <= $n; $i++) $suma += $i;
                        echo "<h3>Sumatoria de 1 hasta $n = <b>$suma</b></h3>";
                        
                    } elseif ($opcion == 'factorial') {
                        $fact = 1;
                        for ($i = 1; $i <= $n; $i++) $fact *= $i;
                        echo "<h3>Factorial de $n! = <b>$fact</b></h3>";
                        
                    } elseif ($opcion == 'fibonacci') {
                        $fib = array(0, 1);
                        for ($i = 2; $i <= $n; $i++) $fib[$i] = $fib[$i-1] + $fib[$i-2];
                        echo "<h3>Serie Fibonacci hasta n=$n: <b>" . implode(", ", $fib) . "</b></h3>";
                        
                    } elseif ($opcion == 'dividir') {
                        // El enunciado no especifica entre qué dividir. Dividiremos entre 2 como ejemplo.
                        $division = $n / 2;
                        echo "<h3>División de $n entre 2 = <b>$division</b></h3>";
                        
                    } else {
                        echo "<p style='color:red;'>Operación no válida.</p>";
                    }
                    
                } else {
                    echo "<p style='color:red;'>Error: La cookie ha expirado o no se ha seleccionado ninguna opción.</p>";
                }
                ?>
                <br>
                <a href="crear_cookie_menu.php">Volver al Menú de Operaciones</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
