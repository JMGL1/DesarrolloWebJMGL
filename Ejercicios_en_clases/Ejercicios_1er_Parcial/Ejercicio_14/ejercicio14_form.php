<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 14 - Formulario</title>
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
            <h2>Ingresar Parámetros</h2>
            <div class="formulario-box">
                <?php
                if (isset($_POST['opcion'])) {
                    $opcion = $_POST['opcion'];
                    echo "<form action='ejercicio14_procesar.php' method='POST'>";
                    echo "<input type='hidden' name='opcion' value='$opcion'>";
                    
                    if ($opcion == 'fibonacci') {
                        echo "<label for='n'>Ingrese el límite n para Fibonacci:</label>";
                        echo "<input type='number' name='n' id='n' required min='0'>";
                    } elseif ($opcion == 'mayor') {
                        echo "<label for='a'>Ingrese el número a:</label>";
                        echo "<input type='number' name='a' id='a' required step='any'>";
                        echo "<label for='b'>Ingrese el número b:</label>";
                        echo "<input type='number' name='b' id='b' required step='any'>";
                        echo "<label for='c'>Ingrese el número c:</label>";
                        echo "<input type='number' name='c' id='c' required step='any'>";
                    } elseif ($opcion == 'piramide') {
                        echo "<label for='cadena'>Ingrese la cadena de texto (ej: EXAMEN):</label>";
                        echo "<input type='text' name='cadena' id='cadena' required>";
                    }
                    
                    echo "<input type='submit' value='Procesar'>";
                    echo "</form>";
                } else {
                    echo "<p style='color:red;'>No se seleccionó ninguna opción.</p>";
                }
                ?>
                <br>
                <a href="../Ejercicio_14/ejercicio14_menu.html">Volver al Menú</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
