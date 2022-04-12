<?php
//This line is like the endpoint form where we get the data
header("Access-Control-Allow-Origin: http://localhost:4200");
//In this line we include our conection to the data base
$db = include_once "conection.php";
//In this line we are goint to save the  the consult in a var
$consult = $db->query("SELECT * FROM `storepoint`.`products` , `storepoint`.`marcas` WHERE idBand = idMarca;");
//And in this line we are going to save the results of the consult in a var
$products = $consult->fetchAll(PDO::FETCH_OBJ);
//This line is going to show us the result of the var in json format
echo json_encode($products);
?>

