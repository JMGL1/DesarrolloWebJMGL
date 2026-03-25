<?php
$p = [
    [
        "nombre" => "Manzana",
        "categoria" => "Frutas",
        "precio" => 50,
        "disponible" => true,
        "caracteristicas" => ["Roja", "Muy Dulce", "Origen: Chile"]
    ],
    [
        "nombre" => "Mouse",
        "categoria" => "Accesorios",
        "precio" => 120,
        "disponible" => true,
        "caracteristicas" => ["Inalambrico", "Color Negro", "Sensor Optico"]
    ],
    [
        "nombre" => "Monitor",
        "categoria" => "Pantallas",
        "precio" => 1500,
        "disponible" => false,
        "caracteristicas" => ["24 Pulgadas", "Full HD", "60Hz"]
    ],
    [
        "nombre" => "Platano",
        "categoria" => "Frutas",
        "precio" => 3,
        "disponible" => true,
        "caracteristicas" => [" Amarillo", "Muy Dulce", "Origen: Ecuador"]
    ],
    [
        "nombre" => "PC Gamer",
        "categoria" => "Computadoras",
        "precio" => 8000,
        "disponible" => false,
        "caracteristicas" => ["Tarjeta de Video RTX", "32GB RAM", "Fuente 700w"]
    ]
];

$n = count($p);
for ($i = 0; $i < $n - 1; $i++) {
    for ($j = 0; $j < $n - $i - 1; $j++) {
        if ($p[$j]["precio"] > $p[$j + 1]["precio"]) {
            $temp = $p[$j];
            $p[$j] = $p[$j + 1];
            $p[$j + 1] = $temp;
        }
    }
}


$tot = 0;
$c_d = 0; 
$c_a = 0; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Productos</h1>
    <div>
        <?php 
        foreach ($p as $prod) { 
            $tot = $tot + $prod["precio"];
            if ($prod["disponible"] == true) {
                $c_d = $c_d + 1;
                $clase = "disp";
                $estado = "Disponible";
            } else {
                $c_a = $c_a + 1;
                $clase = "ago";
                $estado = "Agotado";
            }
        ?>
            <div class="tarjeta">
                <h2><?php echo $prod["nombre"]; ?></h2>
                <p>Categoría: <?php echo $prod["categoria"]; ?></p>
                <p>Precio: Bs. <?php echo $prod["precio"]; ?></p>
                <p class="<?php echo $clase; ?>">Estado: <?php echo $estado; ?></p>
                
                <p>Características:</p>
                <ul>
                    <?php 
                    foreach ($prod["caracteristicas"] as $car) { 
                    ?>
                        <li><?php echo $car; ?></li>
                    <?php 
                    } 
                    ?>
                </ul>
            </div>
        <?php 
        } 
        ?>
    </div>

    <div class="resumen">
        <h2>Inventario</h2>
        <ul>
            <li>Costo Total:<?php echo $tot; ?></li>
            <li>Productos Disponibles: <?php echo $c_d; ?></li>
            <li>Productos Agotados: <?php echo $c_a; ?></li>
        </ul>
    </div>

    <div class="seccion-cat">
        <h2>Sección de categoria exclusiva</h2>
        <?php 
        foreach ($p as $prod) {
            if ($prod["categoria"] == "Computadoras") {
        ?>
            <ul>
                <li><?php echo $prod["nombre"]; ?> - Bs. <?php echo $prod["precio"]; ?></li>
            </ul>
        <?php
            }
        }
        ?>
    </div>

</body>
</html>