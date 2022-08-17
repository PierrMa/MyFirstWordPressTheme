<?php
    //This page is only to determine if the user is logged in and what kind of user is it

    session_start();//start the session

    if(isset($_SESSION['ID']) && isset($_SESSION['PWD'])){//if the user is logged in
        //determine the kind of user (registered, subscriber, VIP)
        echo 'Bienvenu sur ton compte '.$_SESSION['ID'];//test
        echo '<br><a href="http://fructicash.local/sign-out"><button>Log out</button></a>';//test
    }else{//if the user is not logged in
        //redirect to Sign in page
        wp_redirect('http://fructicash.local/sign-in');
        exit();
    }
?>
