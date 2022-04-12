<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: *");

$idProduct = 0;

$metodo = $_SERVER["REQUEST_METHOD"];
if($metodo != "PUT"){
    exit("Solo se permite el metodo PUT");
}

$jsonProduct = Json_decode(file_get_contents("php://input"));
/* if(!$jsonProduct->idProduct){
    exit("No existe id para actualizar");
} */
if(!$jsonProduct){
    exit("No hay datos para editar");
}
// $idProduct = $_GET["idProduct"];
$db = include_once "conection.php";

$consulta = $db->prepare("UPDATE `products` SET `product` = ?, `description` = ?, `price` = ?, `stock` = ?, `category` = ?, `idBand` = ? WHERE `products`.`idProduct` = ?;");
$res = $consulta->execute([
    $jsonProduct->product,
    $jsonProduct->description,
    $jsonProduct->price,
    $jsonProduct->stock,
    $jsonProduct->category,
    $jsonProduct->idBand,
    $jsonProduct->idProduct
]);

json_encode($res);
?>