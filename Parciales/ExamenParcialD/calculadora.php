<?php
class Calculadora {
    public array $historial = [];
    public $ultimo_resultado = null;

    // Fibonacci: calcula el n-ésimo número
    public function fibonacci(int $n): int {
        if ($n <= 0) return 0;
        if ($n === 1) return 0;
        if ($n === 2) return 1;
        $a = 0;
        $b = 1;
        for ($i = 2; $i < $n; $i++) {
            $temp = $a + $b;
            $a = $b;
            $b = $temp;
        }
        $this->ultimo_resultado = $b;
        $this->historial[] = "Fibonacci($n) = $b";
        return $b;
    }

    // Factorial: calcula n!
    public function factorial(int $n): int {
        if ($n < 0) return 0;
        $result = 1;
        for ($i = 2; $i <= $n; $i++) {
            $result *= $i;
        }
        $this->ultimo_resultado = $result;
        $this->historial[] = "Factorial($n) = $result";
        return $result;
    }

    // Sumatoria: suma de 1 hasta n
    public function sumatoria(int $n): int {
        $result = ($n * ($n + 1)) / 2;
        $this->ultimo_resultado = $result;
        $this->historial[] = "Sumatoria($n) = $result";
        return $result;
    }

    // Mostrar historial en tabla HTML
    public function mostrarHistorial(): string {
        if (empty($this->historial)) {
            return '<p style="color:#888; font-style:italic;">El historial está vacío.</p>';
        }
        $html  = '<table class="tabla-historial">';
        $html .= '<thead><tr><th>#</th><th>Operación</th><th>Resultado</th></tr></thead><tbody>';
        foreach ($this->historial as $idx => $entrada) {
            // Extraer operación y resultado del texto "Nombre(n) = resultado"
            preg_match('/^(.+)\s*=\s*(.+)$/', $entrada, $m);
            $operacion = trim($m[1] ?? $entrada);
            $resultado = trim($m[2] ?? '');
            $html .= "<tr><td>" . ($idx + 1) . "</td><td>$operacion</td><td>$resultado</td></tr>";
        }
        $html .= '</tbody></table>';
        return $html;
    }

    // Limpiar historial
    public function limpiarHistorial(): void {
        $this->historial = [];
        $this->ultimo_resultado = null;
    }

    // Generar serie Fibonacci hasta el n-ésimo término
    public function serieFibonacci(int $n): array {
        $serie = [];
        $a = 0;
        $b = 1;
        for ($i = 0; $i < $n; $i++) {
            $serie[] = $a;
            [$a, $b] = [$b, $a + $b];
        }
        return $serie;
    }

    // Generar proceso factorial: "5! = 5 x 4 x 3 x 2 x 1 = 120"
    public function procesoFactorial(int $n): string {
        if ($n <= 0) return "0! = 1";
        $partes = [];
        for ($i = $n; $i >= 1; $i--) {
            $partes[] = $i;
        }
        $result = $this->factorial($n);
        // Re-add to history because factorial() already added, remove duplicate
        array_pop($this->historial);
        $this->historial[] = "Factorial($n) = $result";
        return "$n! = " . implode(' x ', $partes) . " = $result";
    }
}
?>
