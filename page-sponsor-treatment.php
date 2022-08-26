<?php
    session_start();
    if(isset($_POST['id']) && isset($_POST['mdp']) && isset($_POST['typeOfSubscription'])&& isset($_POST['email'])){//check if all the fields have been filled
        //check if the login and the password are already used
        if(!(username_exists($_POST['id']) & email_exists($_POST['email']))){//if this credential are not used already
            wp_create_user( $_POST['id'], $_POST['mdp'], $_POST['email'] );//register the user
            
            $login = htmlspecialchars($_POST['id']);
            $password =  htmlspecialchars($_POST['mdp']);
            $subscription = htmlspecialchars($_POST['typeOfSubscription']);
            
            //add user's account in the table 'account'
            try
            {
                $mysqlClient = new PDO('mysql:host=localhost;dbname=local;charset=utf8;port=10011', 'root', 'root');
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }
            $sqlQuery = "INSERT INTO account(month_of_subscription,user_login,user_pass,amount_wagered,subscription_price,number_of_sponsored_2,number_of_sponsored_5,number_of_sponsored_10,number_of_sponsored_30,number_of_sponsored_50,number_of_sponsored_VIP) VALUES (:month_of_subscription,:user_login,:user_pass,:amount_wagered,:subscription_price,:number_of_sponsored_2,:number_of_sponsored_5,:number_of_sponsored_10,:number_of_sponsored_30,:number_of_sponsored_50,:number_of_sponsored_VIP)";
            $inserRecipe = $mysqlClient->prepare($sqlQuery);
            $inserRecipe->execute([
                'month_of_subscription'=>date('m'),
                'user_login'=>$login, 
                'user_pass'=>$password, 
                'amount_wagered'=>0, 
                'subscription_price'=>$subscription, 
                'number_of_sponsored_2'=>0,
                'number_of_sponsored_5'=>0,
                'number_of_sponsored_10'=>0,
                'number_of_sponsored_30'=>0,
                'number_of_sponsored_50'=>0,
                'number_of_sponsored_VIP'=>0,
            ])or die(print_r($mysqlClient->errorInfo().'insert'));
    
            //fetch the previous value of the number of sponsored people
            $sqlQuery = 'SELECT number_of_sponsored_2, number_of_sponsored_5, number_of_sponsored_10, number_of_sponsored_30, number_of_sponsored_50, number_of_sponsored_VIP FROM account WHERE user_login = :id AND user_pass= :pwd';
            $sqlResponse = $mysqlClient->prepare($sqlQuery);
            $sqlResponse->execute([
                'id' => $_SESSION['ID'],
                'pwd' => $_SESSION['PWD']
            ])or die(print_r($mysqlClient->errorInfo().'fetch'));
            $previousValues = $sqlResponse->fetchAll();
            $newValues[6];
            
            for($i=0;$i<6;$i++){
                if($subscription==2 && $i==0){
                    $array1=[$previousValues[0][$i],1];
                }elseif($subscription==5 && $i==1){
                    $array1=[$previousValues[0][$i],1];
                }elseif($subscription==10 && $i==2){
                    $array1=[$previousValues[0][$i],1];
                }elseif($subscription==30 && $i==3){
                    $array1=[$previousValues[0][$i],1];
                }elseif($subscription==50 && $i==4){
                    $array1=[$previousValues[0][$i],1];
                }elseif($subscription==100 && $i==5){
                    $array1=[$previousValues[0][$i],1];
                }else{
                    $array1=[$previousValues[0][$i],0];
                }
                
                $newValues[$i]=array_sum($array1);
            }
            
            //add a sponsored person to the user
            $sqlQuery = 'UPDATE account SET number_of_sponsored_2=:number_of_sponsored_2, number_of_sponsored_5=:number_of_sponsored_5, number_of_sponsored_10=:number_of_sponsored_10, number_of_sponsored_30=:number_of_sponsored_30, number_of_sponsored_50=:number_of_sponsored_50, number_of_sponsored_VIP=:number_of_sponsored_VIP WHERE user_login = :id AND user_pass= :pwd';
            $sqlResponse = $mysqlClient->prepare($sqlQuery);
            $sqlResponse->execute([
                'number_of_sponsored_2'=>$newValues[0],
                'number_of_sponsored_5'=>$newValues[1],
                'number_of_sponsored_10'=>$newValues[2],
                'number_of_sponsored_30'=>$newValues[3],
                'number_of_sponsored_50'=>$newValues[4],
                'number_of_sponsored_VIP'=>$newValues[5],
                'id' => $_SESSION['ID'],
                'pwd' => $_SESSION['PWD'],
            ])or die(print_r($mysqlClient->errorInfo().'update'));

            //display a congratulation message
            get_header();
            echo "<div class='pageCommentContainer'>";
            echo "<br><br><p id='registrationErrorMessage'>Congratulation!!! You've just sponsored a lucky person!";//echo a congratulation message
            echo "<br><br>Click on one of the 2 buttons below to choose where you want to go next:</p>
            <form method='post' id='commentForm'>
                <button type='submit' id='yourAccountButton' formaction='http://fructicash.local/mon-compte'>Your Account</button>
                <button type='submit' id='backToHomePageButton' class='pmfButton' formaction='http://fructicash.local/sponsor'>Sponsor another person!</button>
            </form></div>";
            get_footer();
        }else{//if the credentials are already used
            $_SESSION['used-credentials']=true;
            $_SESSION['sponsor']=false;
            wp_redirect("http://fructicash.local/sponsor");
            exit();
        }
    }else{//if one field has not been filled
        $_SESSION['sponsor']=false;
        wp_redirect('http://fructicash.local/sponsor');//back to the forms
        exit();
    }

?>