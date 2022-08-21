<?php 
    session_start(); 
?>

<?php 
if(isset($_SESSION['ID']) && isset($_SESSION['PWD'])){
    get_header();
    if(!isset($_POST['amountAdded'])){
        echo '<h1 class="signUpTilte">'.get_the_title().'</h1>';
        echo'
        <div id=formContainer>
        <form method = "post" id="registerForm">
            <p class=amountAddedContainer>
                <label for="amountAdded">Amount Added</label>
                <input type="number" id="amountAdded" name="amountAdded" min=0.01 step=0.01 required/>
            </p>
            <button type="sumbit" id="amountAddedButton">Validate !</button>
        </form>
        </div>
        ';
    }else{
        echo'<p style="text-align:center;"><br><br>Congratulation, you have just increased your chances to win by wagering <strong>'.$_POST['amountAdded'].'</strong>€<br><br></p>';
        
        //update the variable amount wagered of the user
        try
        {
            $mysqlClient = new PDO('mysql:host=localhost;dbname=local;charset=utf8;port=10011', 'root', 'root');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        //get the previous value of amount_wagered
        $sqlQuery = 'SELECT amount_wagered FROM account WHERE user_login = :id AND user_pass= :pwd';
        $statement = $mysqlClient->prepare($sqlQuery);
        $statement->execute([
            'id' => $_SESSION['ID'],
            'pwd' => $_SESSION['PWD']
        ]);
        $amounts = $statement->fetchAll();
        $valueToAdd = 0;
        foreach($amounts as $amount){
            $valueToAdd=$amount[0];
        }
        $array1 = [$valueToAdd,$_POST['amountAdded']];
        $_SESSION['amount_wagered'] = $array1;

        //update of amount_wagered
        $updateQuery ='UPDATE account SET amount_wagered = :amount_wagered WHERE user_login = :id AND user_pass= :pwd';
        $updateStatement = $mysqlClient->prepare($updateQuery);
        $updateStatement->execute([
            'amount_wagered' => array_sum($array1),
            'id' => $_SESSION['ID'],
            'pwd' => $_SESSION['PWD'],
        ]);
    } get_footer();
}else{//if the user is not logged in
    //redirect to Sign in page
    wp_redirect('http://fructicash.local/sign-in');
    exit();
}
?>