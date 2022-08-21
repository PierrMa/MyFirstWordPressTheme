<?php
try
{
	// On se connecte à MySQL
	$mysqlClient = new PDO('mysql:host=localhost;dbname=local;charset=utf8;port=10011', 'root', 'root');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

$sqlQuery = "INSERT INTO account(user_login,user_pass,amount_wagered,subscription_price,number_of_sponsored_2,number_of_sponsored_5,number_of_sponsored_10,number_of_sponsored_30,number_of_sponsored_50,number_of_sponsored_VIP) VALUES (:user_login,:user_pass,:amount_wagered,:subscription_price,:number_of_sponsored_2,:number_of_sponsored_5,:number_of_sponsored_10,:number_of_sponsored_30,:number_of_sponsored_50,:number_of_sponsored_VIP)";
$inserRecipe = $mysqlClient->prepare($sqlQuery);
$inserRecipe->execute([
    'user_login'=>'PierreMarie', 
    'user_pass'=>'pass', 
    'amount_wagered'=>1200, 
    'subscription_price'=>30, 
    'number_of_sponsored_2'=>10,
    'number_of_sponsored_5'=>10,
    'number_of_sponsored_10'=>10,
    'number_of_sponsored_30'=>10,
    'number_of_sponsored_50'=>10,
    'number_of_sponsored_VIP'=>10,
])or die(print_r($mysqlClient->errorInfo()));
get_header();
?>

<!-- Get the date of the deadline -->
<input type="hidden" id="deadline" value="<?php the_field('date_of_the_deadline');?>" />


    <div class="accountSectionContainer">
        <?php 
            $sqlQuery = 'SELECT amount_wagered FROM account';
            $statement = $mysqlClient->prepare($sqlQuery);
            $statement->execute();
            $datas=$statement->fetchAll();
            foreach($datas as $data){
                echo $data[0].'<br>';
            }
        ?>
    </div>
    
<?php get_footer(); ?>