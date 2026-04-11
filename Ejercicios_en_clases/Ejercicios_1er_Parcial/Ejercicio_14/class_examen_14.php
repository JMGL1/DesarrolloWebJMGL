<?php
class examen_14 {
    public $n;
    public $cadena;
    public $a;
    public $b;
    public $c;

    public function __construct($n, $cadena, $a, $b, $c) {
        $this->n = intval($n);
        $this->cadena = $cadena;
        $this->a = floatval($a);
        $this->b = floatval($b);
        $this->c = floatval($c);
    }

    public function Calcularfibonaci() {
        if ($this->n < 0) {
            echo "<p>El número n debe ser mayor o igual a 0.</p>";
            return;
        }
        
        $fib = array();
        $fib[0] = 0;
        if ($this->n >= 1) {
            $fib[1] = 1;
        }
        
        for ($i = 2; $i <= $this->n; $i++) {
            $fib[$i] = $fib[$i-1] + $fib[$i-2];
        }

        echo "<label for='fiboSelect'>Números de Fibonacci hasta " . $this->n . ":</label><br>";
        echo "<select id='fiboSelect' size='5' style='width: 150px;'>";
        foreach ($fib as $index => $valor) {
            echo "<option>Fib($index) = $valor</option>";
        }
        echo "</select>";
    }

    public function Calcular_mayor() {
        echo "<p>Los tres números son: {$this->a}, {$this->b}, {$this->c}</p>";
        $mayor = max($this->a, $this->b, $this->c);
        echo "<p>El número mayor es: <b>$mayor</b></p>";
    }

    public function Piramide() {
        $len = strlen($this->cadena);
        if ($len == 0) return;

        echo "<pre style='text-align: center; font-family: monospace; font-size: 18px;'>";
        
        // La lógica de la pirámide mostrada en el ejemplo (ej. EXAMEN):
        // Se toma un centro y se expande a izquierda y derecha.
        $centro = (int)(($len - 1) / 2); 
        
        for ($i = 0; $i <= $centro + 1; $i++) {
            $inicio = max(0, $centro - $i);
            $longitud = ($i * 2) + 1;
            
            // Caso especial para la última línea (cuando se sobrepasa la longitud)
            if ($inicio + $longitud > $len) {
                $longitud = $len - $inicio;
            }
            
            $sub = substr($this->cadena, $inicio, $longitud);
            echo htmlspecialchars($sub) . "<br>";
            
            if ($inicio == 0 && $longitud == $len) {
                break; // Ya se imprimió toda la cadena
            }
        }
        
        // Asegurar que la cadena completa se imprima al final si no se hizo en el bucle
        if (substr($this->cadena, 0, $len) !== $sub) {
            echo htmlspecialchars($this->cadena) . "<br>";
        }

        echo "</pre>";
    }
}
?>
