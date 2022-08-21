<?php session_start(); get_header(); ?>

<?php
    //check if the users exist already
    if(!(username_exists($_POST['id']) & email_exists($_POST['email-sign-up']))){//if this credential are not used already
        wp_create_user( $_POST['id'], $_POST['mdp'], $_POST['email-sign-up'] );//register the user
        
        $login = htmlspecialchars($_POST['id']);
        $_SESSION['ID']=$login;
        $password =  htmlspecialchars($_POST['mdp']);
        $_SESSION['PWD']=$password;
        
        //initialise user's account in database
        try
        {
            $mysqlClient = new PDO('mysql:host=localhost;dbname=local;charset=utf8;port=10011', 'root', 'root');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        $sqlQuery = "INSERT INTO account(user_login,user_pass,amount_wagered,subscription_price,number_of_sponsored_2,number_of_sponsored_5,number_of_sponsored_10,number_of_sponsored_30,number_of_sponsored_50,number_of_sponsored_VIP) VALUES (:user_login,:user_pass,:amount_wagered,:subscription_price,:number_of_sponsored_2,:number_of_sponsored_5,:number_of_sponsored_10,:number_of_sponsored_30,:number_of_sponsored_50,:number_of_sponsored_VIP)";
        $inserRecipe = $mysqlClient->prepare($sqlQuery);
        $inserRecipe->execute([
            'user_login'=>$login, 
            'user_pass'=>$password, 
            'amount_wagered'=>0, 
            'subscription_price'=>0, 
            'number_of_sponsored_2'=>0,
            'number_of_sponsored_5'=>0,
            'number_of_sponsored_10'=>0,
            'number_of_sponsored_30'=>0,
            'number_of_sponsored_50'=>0,
            'number_of_sponsored_VIP'=>0,
        ])or die(print_r($mysqlClient->errorInfo()));


        echo "<br><br><p id='registrationErrorMessage'>Congratulation!!! You've been successfully registered!";//echo a congratulation message
        echo "<br><br>Click on the button below to go to your account</p><br><br>
        <form action='http://fructicash.local/mon-compte' method='post' id='yourAccountForm'>
            <button type='submit' id='yourAccountButton'>Your Account</button>
        </form>";
    }else{
        echo '
        <h1 class="signUpTilte">Sign up</h1>
        <p id="registrationErrorMessage">There is already an account associated with this email and this login</p>
        <div id=formContainer>
        <form method = "post" id="registerForm">
            <p class=usernameContainer>
                <label for="username-sign-up" >Login</label>
                <input type="text" id="username-sign-up" name="id" required/>
            </p>
            <p class="emailContainer">
                <label for="email-sign-up">Email</label>
                <input type="email" id="email-sign-up" name="email-sign-up" required/>
            </p>
            <p class="pwdContainer">
                <label for="pwd-sign-up">Password</label>
                <input type="password" id="pwd-sign-up" name="mdp" required/>
            </p>
            <button type="sumbit" id="sumbit-sign-up">Register!</button>
        </form>
        </div>';
    }
?>

<?php get_footer() ?>

