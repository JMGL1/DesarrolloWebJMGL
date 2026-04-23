<?php
// Configuración de conexión a MySQL
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'bd_biblioteca');

function getConexion(): mysqli {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        die("<div style='font-family:Arial; color:#c00; padding:20px;'>
              <strong>Error de conexión:</strong> " . htmlspecialchars($conn->connect_error) . "
              <br><small>Asegúrate de que MySQL está activo y la base de datos bd_biblioteca existe.</small>
             </div>");
    }

    $conn->set_charset('utf8');
    return $conn;
}
?>
