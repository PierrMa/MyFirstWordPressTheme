<?php
    //This page is only to determine if the user is logged in and what kind of user is it

    session_start();//start the session

    //connect to the database
    try
    {
        $mysqlClient = new PDO('mysql:host=localhost;dbname=local;charset=utf8;port=10011', 'root', 'root');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    if(isset($_SESSION['ID']) && isset($_SESSION['PWD'])){//if the user is logged in
        //retrieve the subscription catagory of the user
        $sqlQuery= 'SELECT subscription_price FROM account WHERE user_login = :id AND user_pass = :pwd';
        $sqlResponse = $mysqlClient->prepare($sqlQuery);
        $sqlResponse->execute([
            'id'=>$_SESSION['ID'],
            'pwd'=>$_SESSION['PWD'],
        ])or die(print_r($mysqlClient->errorInfo()));
        $amount=$sqlResponse->fetchAll();
        $amount=$amount[0][0];

        //check the subscription of the user and redirect it towards the right user's space
        if($amount==0){
            wp_redirect('http://fructicash.local/registered');
            exit();
        }elseif($amount>=100){
            wp_redirect('http://fructicash.local/VIP');
            exit();
        }else{
            wp_redirect('http://fructicash.local/subscriber');
            exit();
        }
    }else{//if the user is not logged in
        //redirect to Sign in page
        wp_redirect('http://fructicash.local/sign-in');
        exit();
    }
?>
