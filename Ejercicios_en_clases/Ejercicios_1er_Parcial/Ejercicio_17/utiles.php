<?php
class utiles {
    public $cadena;

    public function __construct($cad) {
        $this->cadena = $cad;
    }

    public function aumentarguiones($n) {
        $n = intval($n);
        if ($n < 0) $n = 0;
        
        $guiones = str_repeat('-', $n);
        $len = strlen($this->cadena);
        $resultado = "";
        
        for ($i = 0; $i < $len; $i++) {
            $resultado .= $this->cadena[$i];
            // Agregar guiones después de cada letra, excepto en la última
            if ($i < $len - 1) {
                $resultado .= $guiones;
            }
        }
        
        return $resultado;
    }
}
?>
