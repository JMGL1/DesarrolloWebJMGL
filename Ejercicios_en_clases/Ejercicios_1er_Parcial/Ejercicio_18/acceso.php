<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: form_login.html");
    exit();
}
$rol = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página de Acceso</title>
    <link rel="stylesheet" href="../estilos.css">
    <style>
        .menu-rol { margin-top: 20px; }
        .menu-rol ul { list-style: none; padding: 0; }
        .menu-rol li { display: inline-block; margin-right: 15px; }
        .menu-rol a { text-decoration: none; padding: 10px 20px; background-color: #0056b3; color: white; border-radius: 5px; font-weight: bold; }
        .menu-rol a:hover { background-color: #004494; }
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
            <h2>Página de Acceso</h2>
            <div class="formulario-box">
                <p>Valor de la variable de session: <b><?php echo $rol; ?></b></p>
                
                <div class="menu-rol">
                    <ul>
                        <?php if ($rol == 'admin') { ?>
                            <li><a href="#">Crear</a></li>
                            <li><a href="#">Listar</a></li>
                            <li><a href="#">Borrar</a></li>
                            <li><a href="../Ejercicio_18/form_login.html">Salir</a></li>
                        <?php } else { ?>
                            <li><a href="#">Listar</a></li>
                            <li><a href="../Ejercicio_18/form_login.html">Salir</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
