<?php
    session_start();

    //update the account table
    try
    {
        $mysqlClient = new PDO('mysql:host=localhost;dbname=local;charset=utf8;port=10011', 'root', 'root');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    $sqlQuery = 'UPDATE account SET subscription_price = :amount WHERE user_login = :id AND user_pass = :pwd';
    $update = $mysqlClient -> prepare($sqlQuery);
    $update -> execute([
        'amount'=>$_POST['fee'],
        'id'=>$_SESSION['ID'],
        'pwd'=>$_SESSION['PWD'],
    ])or die(print_r($mysqlClient->errorInfo()));
    
    get_header();
?>

<!-- display a successful message -->
<p class="successMessage">Congratulations! You have successfully subscribed to the <?php echo $_POST['fee']; ?>€/month subscription!<p>

<!-- button to go to account -->
<form action='http://fructicash.local/mon-compte' method='post' id='yourAccountForm'>
    <button type='submit' class='messageButton'>Go To Your Account</button>
</form>";

<?php
    get_footer();
?>