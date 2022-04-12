<?php 
    header("Access-Control-Allow-Origin: http://localhost:8100");
    $idPlatillo = 0;
    
    if(empty($_GET["idPlatillo"])){
        echo "No hay algun ID de platillo";
    }
    $idPlatillo = $_GET["idPlatillo"];
    $bd = include_once "bd.php";
    $consulta = $bd->prepare("select * from platillo where id = ?");
    $consulta->execute([$idPlatillo]);
    $platillo = $consulta->fetchObject();
    echo json_encode($platillo);
?>