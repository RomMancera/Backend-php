<?php 
    header("Acces-Control-Allow-Origin: http://localhost:8100");
    header("Acces-Control-Allow-Methods: PUT");
      header("Acces-Control-Allow-Methods: *");
    $idPlatillo = 0;

        $metodo = $_SERVER["REQUEST_METHOD"];
        if($metodo != "PUT"){
            exit("Solo se permite el metodo PUT");
        } 
        $jsonPlatillo = json_decode(file_get_contents("php://input"));
        if(empty($_GET["idPlatillo"])){
            exit("No esxiste id para actualizar");
        }
        if(!$jsonPlatillo){
            exit("no hay datos");
        }
        $idPlatillo = $_GET["idPlatillo"];
        $bd = include_once "bd.php";
        $consulta = $bd->prepare("update platillo set nombre = ?, precio = ?, ingredientes = ? where id = ?");
        $res = $consulta->execute([
            $jsonPlatillo->nombre, 
            $jsonPlatillo->precio, 
            $jsonPlatillo->ingredientes, 
            $idPlatillo 
        ]);
        echo json_encode($res);
?>