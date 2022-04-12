<?php 
    header("Acces-Control-Allow-Origin: http://localhost:8100");
    header("Acces-Control-Allow-Methods: DELETE");
  $idPlatillo = 0;
  /*   $metodo = $_SERVER["REQUEST_METHOD"];
    if($metodo != "DELETE" && $metodo != "OPTIONS"){
        exit("Solo se permite el metodo DELETE");
    } */

    if(empty($_GET["idPlatillo"])){
        echo "No hay algun ID de platillo para eliminar";
    }
    $idPlatillo = $_GET["idPlatillo"];
    $bd = include_once "bd.php";
    $consulta = $bd->prepare("delete from platillo where id = ?");
    $res = $consulta-> execute([$idPlatillo]);
    echo json_encode($res);
?>