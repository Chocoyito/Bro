<?php
if($_SERVER["REQUEST_METHOD"] == "GET") {
    require_once 'Conexion.php';
    $my_query = "SELECT * FROM coordinador
    WHERE DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), fechaNac)), '%Y')+0 >= 60;";
    
    $result = $mysql ->query($my_query);
    if($mysql->affected_rows > 0) {
        $json = "{\"data\":[";

            while($row = $result->fetch_assoc()){
                $json = $json.json_encode($row);
                $json=$json.",";
            }

            $json=substr(trim($json),0,-1);
            $json = $json."]}";
    }
    echo $json;
    $result->close();
    $mysql->close();
}
?>