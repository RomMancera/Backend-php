<?php
//The headers are the pleaces where the information come from
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Headers: *");

//This is going to decode the object in Json to read the values
$JsonProduct = Json_decode(file_get_contents("php://input"));

//This line check if we send something in our var JsonProduct
if(!$JsonProduct){
    exit("No existen datos");
}
//We include our conection to the database
$db = include_once "conection.php";

//Here we make the consult in our database thart maeans our INSERT INTO
$consult = $db->prepare("INSERT INTO `products` (`product`, `description`, `price`, `stock`, `category`, `idBand`)
    VALUES (?, ?, ?, ?, ?, ?);");
// In this line we execute al the values 
$result = $consult->execute([
    $JsonProduct->product,
    $JsonProduct->description,
    $JsonProduct->price,
    $JsonProduct->stock,
    $JsonProduct->category,
    $JsonProduct->idBand
]);

//In this line we Show a message about the result of the process if is true or false
echo json_encode([
    "producto nuevo"=>$result,
]);

?>