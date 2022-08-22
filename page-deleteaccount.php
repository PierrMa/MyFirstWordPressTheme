<?php 
    try{
        $mysqlClient = new PDO('mysql:host=localhost;dbname=local;charset=utf8;port=10011', 'root', 'root');
    }catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }

    $sqlQuery = 'UPDATE account set amount_wagered=0';
    $deleteAccounts = $mysqlClient -> prepare($sqlQuery);
    $deleteAccounts -> execute()or die(print_r($mysqlClient->errorInfo()));
?>