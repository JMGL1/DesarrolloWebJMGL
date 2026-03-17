<?php
class Pila {
    var $elementos = array();
    var $tope = 0;
    var $max;

    function __construct($maximo) {
        $this->max = $maximo;
    }

    function insertar($elemento) {
        if ($this->tope < $this->max) {
            $this->elementos[$this->tope] = $elemento;
            $this->tope++;
            return true;
        } else {
            return false;
        }
    }

    function eliminar() {
        if ($this->tope > 0) {
            $this->tope--;
            $valor = $this->elementos[$this->tope];

            unset($this->elementos[$this->tope]); 
            return $valor;
        } else {
            return null;
        }
    }

    function mostrar() {
        if ($this->tope == 0) {
            echo "La pila está  vacía.<br>";
        } else {
            echo "<strong>--- CIMA ---</strong><br>";

            for ($i = $this->tope - 1; $i >= 0; $i--) {
                echo "[" . $this->elementos[$i] . "]<br>";
            }
            echo "<strong>--- BASE ---</strong><br>";
        }
    }
}
?>