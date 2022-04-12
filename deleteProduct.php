<?php 
    header("Access-Control-Allow-Origin: http://localhost:4200");
    header("Access-Control-Allow-Methods: DELETE");
    $idProduct = 0;
    /*   $metodo = $_SERVER["REQUEST_METHOD"];
    if($metodo != "DELETE" && $metodo != "OPTIONS"){
        exit("Solo se permite el metodo DELETE");
    } */

    if(empty($_GET["id"])){
        echo "No hay algun ID de platillo para eliminar";
    }
    $idProduct = $_GET["id"];
    $bd = include_once "conection.php";
    $consulta = $bd->prepare("DELETE FROM products WHERE idProduct = ?");
    $res = $consulta-> execute([$idProduct]);
    echo json_encode($res);
?>