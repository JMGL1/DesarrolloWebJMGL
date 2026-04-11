<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado - Ejercicio 14</title>
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
            <h2>Resultado del Ejercicio 14</h2>
            <div class="formulario-box">
                <?php
                require_once 'class_examen_14.php';

                if (isset($_POST['opcion'])) {
                    $opcion = $_POST['opcion'];
                    
                    // Inicializar con valores por defecto
                    $n = isset($_POST['n']) ? $_POST['n'] : 0;
                    $cadena = isset($_POST['cadena']) ? $_POST['cadena'] : "";
                    $a = isset($_POST['a']) ? $_POST['a'] : 0;
                    $b = isset($_POST['b']) ? $_POST['b'] : 0;
                    $c = isset($_POST['c']) ? $_POST['c'] : 0;
                    
                    $examen_obj = new examen_14($n, $cadena, $a, $b, $c);
                    
                    if ($opcion == 'fibonacci') {
                        $examen_obj->Calcularfibonaci();
                    } elseif ($opcion == 'mayor') {
                        $examen_obj->Calcular_mayor();
                    } elseif ($opcion == 'piramide') {
                        $examen_obj->Piramide();
                    }
                    
                } else {
                    echo "<p style='color:red;'>No se recibieron los datos correctamente.</p>";
                }
                ?>
                <br><br>
                <a href="../Ejercicio_14/ejercicio14_menu.html">Volver al Menú</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
