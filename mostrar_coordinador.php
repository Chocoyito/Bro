<?php
require_once 'Conexion.php';

// Verificar si la conexión es exitosa
if ($mysql->connect_error) {
    die("Connection failed: " . $mysql->connect_error);
}

// Función para mostrar los registros de una tabla
function mostrar($coordinador) {
    global $mysql;
    $sql = "SELECT * FROM coordinador WHERE DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), fechaNac)), '%Y')+0 >= 60";
    $result = $mysql->query($sql);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    
    return json_encode($rows);
}

echo mostrar('coordinador');
?>
