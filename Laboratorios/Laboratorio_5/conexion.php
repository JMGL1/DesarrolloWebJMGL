<?php
$link = new mysqli("localhost", "root", "", "bd_biblioteca");

if ($link->connect_error) {
    die("conexion fallada: " . $link->connect_error);
}
?>