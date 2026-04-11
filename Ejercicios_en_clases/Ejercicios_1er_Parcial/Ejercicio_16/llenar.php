<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Llenar Valores - Ejercicio 16</title>
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
            <h2>Introduzca los Valores</h2>
            <div class="formulario-box" style="display: flex; flex-direction: column; align-items: center;">
                <?php
                if (isset($_POST['n'])) {
                    $n = intval($_POST['n']);
                    
                    if ($n > 0) {
                        echo "<form action='multiplicacion.php' method='POST' style='display: flex; flex-direction: column; align-items: center; border: 1px solid #000; padding: 20px;'>";
                        
                        for ($i = 0; $i < $n; $i++) {
                            echo "<input type='number' name='valores[]' required step='any' style='text-align: center; width: 60px; margin-bottom: 5px; border: 1px solid #000;'>";
                        }
                        
                        echo "<input type='submit' value='calcular' style='margin-top: 10px; border-radius: 5px; border: 1px solid #000;'>";
                        echo "</form>";
                    } else {
                        echo "<p style='color:red;'>El número debe ser mayor a 0.</p>";
                    }
                } else {
                    echo "<p style='color:red;'>No se recibió la cantidad de campos.</p>";
                }
                ?>
                <br>
                <a href="../Ejercicio_16/pregunta3_16.html">Volver</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
