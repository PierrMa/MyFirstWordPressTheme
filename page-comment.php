<?php

    session_start();

    if(!isset($_SESSION['comment'])){
        $_SESSION['comment']=$_POST['comment'];//save the comment in a variable befor going to another page
    }
    
    if(isset($_SESSION['ID'])&&isset($_SESSION['PWD'])){//if the user is logged in

        //save the comment in the database
        try{
            $mysqlClient = new PDO('mysql:host=localhost;dbname=local;charset=utf8;port=10011', 'root', 'root');
        }catch(Exception $e){ 
            die('Error : '.$e->getMessage());
        }

        $sqlQuery = 'INSERT INTO pmf_comment(comment_author,comment_date,comment_time,comment_content) VALUES(:comment_author,:comment_date,:comment_time,:comment_content)';
        $insertComment = $mysqlClient->prepare($sqlQuery);
        $insertComment->execute([
            'comment_author'=>$_SESSION['ID'],
            'comment_date'=>date("Y/m/d"),
            'comment_time'=>date("H:i:s"),
            'comment_content'=>$_SESSION['comment'],
        ])or die(print_r($mysqlClient->errorInfo()));

        //display a congratulation message
        get_header();
        echo "<div class='pageCommentContainer'>";
        echo "<br><br><p id='registrationErrorMessage'>Congratulation!!! Your comment has been successfully sent!<br>We are thankful for the time you took to assess our website!";//echo a congratulation message
        echo "<br><br>Click on one of the 2 buttons below to choose where you want to go next:</p>
        <form method='post' id='commentForm'>
            <button type='submit' id='yourAccountButton' formaction='http://fructicash.local/mon-compte'>Your Account</button>
            <button type='submit' id='backToHomePageButton' class='pmfButton' formaction='http://fructicash.local/'>Home Page</button>
        </form></div>";

        get_footer();
    }else{//if the user in not logged in
        wp_redirect("http://fructicash.local/sign-in");
        exit();
    }

?>