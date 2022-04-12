<?php 
    header("Access-Control-Allow-Origin: http://localhost:4200");
    $idProduct = 0;
    
    if(empty($_GET["id"])){
        echo "No hay algun ID de producto";
    }
    $idProduct = $_GET["id"];
    $bd = include_once "conection.php";
    $consulta = $bd->prepare("SELECT * FROM `storepoint`.`products` , `storepoint`.`marcas` WHERE idProduct = ? and idBand = idMarca;");
    $consulta->execute([$idProduct]);
    $product = $consulta->fetchObject();
    echo json_encode($product);
?>