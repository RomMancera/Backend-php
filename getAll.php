<?php
header("Access-Control-Allow-Origin: http://localhost:8100");
$bd = include_once "bd.php";
$consulta = $bd->query("Select * from platillo");
$platillos = $consulta->fetchAll(PDO::FETCH_OBJ); 
echo json_encode($platillos);
?>