<?php
if (isset($_POST['numero_cookie'])) {
    $num = intval($_POST['numero_cookie']);
    // Crear cookie válida por 1 hora
    setcookie("numero_ej19", $num, time() + 3600, "/");
} else {
    // Si ya existe la cookie, mantenerla
    $num = isset($_COOKIE['numero_ej19']) ? $_COOKIE['numero_ej19'] : null;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú - Ejercicio 19</title>
    <link rel="stylesheet" href="../estilos.css">
    <style>
        .menu-cookie ul { list-style: none; padding: 0; }
        .menu-cookie li { margin-bottom: 10px; }
        .menu-cookie a { display: inline-block; padding: 10px 20px; background-color: #0056b3; color: white; text-decoration: none; border-radius: 5px; width: 150px; text-align: center; }
        .menu-cookie a:hover { background-color: #004494; }
    </style>
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
            <h2>Opciones de la Cookie</h2>
            <div class="formulario-box">
                <?php if ($num !== null) { ?>
                    <p>Valor de la cookie guardada: <b><?php echo $num; ?></b></p>
                    <p>Seleccione una operación:</p>
                    <div class="menu-cookie">
                        <ul>
                            <li><a href="operacion_cookie.php?opcion=sumatoria">Sumatoria</a></li>
                            <li><a href="operacion_cookie.php?opcion=factorial">Factorial</a></li>
                            <li><a href="operacion_cookie.php?opcion=fibonacci">Fibonacci</a></li>
                            <li><a href="operacion_cookie.php?opcion=dividir">Dividir</a></li>
                        </ul>
                    </div>
                <?php } else { ?>
                    <p style="color:red;">Error: No se recibió ningún número ni existe la cookie.</p>
                <?php } ?>
                <br>
                <a href="../Ejercicio_19/form_cookie19.html">Volver</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
