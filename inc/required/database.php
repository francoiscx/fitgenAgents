<?php

//initialize variables to hold connection parameters

$user = 'fitgen';
$dsn = 'mysql:host=localhost; dbname=fitgen';
$password = ']$1C1=[BT}&s';


try{
    //create an instance of PDO calss with the required parameters
    $db = new PDO($dsn, $user, $password);
    
    //set PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //display succcess message
    //echo "Connected to the register database";
    
} catch (PDOException $ex) {
    //display error message
    echo "Connection failed ".$ex->getMessage();
    
}