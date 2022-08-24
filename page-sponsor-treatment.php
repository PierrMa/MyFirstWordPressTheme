<!-- <?php
    if(isset($_POST['id']) && isset($_POST['mdp']) && isset($_POST['typeOfSubscription'])&& isset($_POST['email'])){//check if all the fields have been filled
        //check if the login and the password are already used
        if(!(username_exists($_POST['id']) & email_exists($_POST['email']))){//if this credential are not used already
            wp_create_user( $_POST['id'], $_POST['mdp'], $_POST['email'] );//register the user
            
            $login = htmlspecialchars($_POST['id']);
            $password =  htmlspecialchars($_POST['mdp']);
            
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
    }

?> -->