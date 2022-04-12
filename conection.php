<?php
//password of the dataBase
$passDb ="";
//User Name of the database
$userDb ="root";
//Name of the database already created
$dbName ="storepoint";
// The conection to the data base
try{
    return new PDO ('mysql:host=localhost;dbname='.$dbName,$userDb,$passDb);
}
//If something is wrong these lines is going to show the error
catch(Exception $error){
    echo "Valio caca, no jalo:c".$error->getMessage(); 
} 
?>