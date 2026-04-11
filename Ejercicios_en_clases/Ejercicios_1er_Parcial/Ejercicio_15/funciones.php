<?php
function fibonaci($n) {
    if ($n < 0) return 0;
    if ($n == 0) return 0;
    if ($n == 1) return 1;
    
    $a = 0;
    $b = 1;
    $c = 1;
    
    for ($i = 2; $i <= $n; $i++) {
        $c = $a + $b;
        $a = $b;
        $b = $c;
    }
    
    return $c;
}

function sumatoria($n) {
    if ($n < 0) return 0;
    $suma = 0;
    for ($i = 1; $i <= $n; $i++) {
        $suma += $i;
    }
    return $suma;
}
?>
