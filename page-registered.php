<?php 
    session_start();
    get_header(); 
?>

<!-- Get the date of the deadline -->
<input type="hidden" id="deadline" value="<?php the_field('date_of_the_deadline', 'option');?>" />

    <div class="accountSectionContainer">
        <div id="account-TASContainer" style="background-image: url('<?php echo get_field('draw_image');?>');">
            <div id="timerContainer">
                <p id="timerContainerTitle">Time Left </p>
                <div id="timer">
                    <span id="day" class="timeBox"></span>
                    <span id="hour" class="timeBox"> </span>
                    <span id="minute" class="timeBox"></span>
                    <span id="second" class="timeBox"></span>
                </div>
            </div>

            <!--section to add the code to clear up the account table in the database when the time is over -->
            <div id="php"></div>

            <a href="<?php echo get_field('play', 'option');?>"><input type="button" value="Play!" id="playButton" style="display:block;"/></a>
        </div>

        <div id="account-CurrentEventContainer" style="background-image:url('<?php echo get_field('event_image');?>');">
            <a href="<?php echo get_field('participate', 'option');?>"><input type="button" value="Participate!" id="participateButton"/></a>
        </div>

        <div class="amountBetContainer" style="background-image:url('<?php echo get_field('bet_image');?>');">
            <p>Amount bet at the draw:</p>
            <p>
                <?php 
                    try
                    {
                        $mysqlClient = new PDO('mysql:host=localhost;dbname=local;charset=utf8;port=10011', 'root', 'root');
                    }
                    catch(Exception $e)
                    {
                        die('Erreur : '.$e->getMessage());
                    }
                    $sqlQuery = 'SELECT amount_wagered FROM account WHERE user_login = :id AND user_pass =:pwd';
                    $statement = $mysqlClient->prepare($sqlQuery);
                    $statement->execute([
                        'id'=>$_SESSION['ID'],
                        'pwd'=>$_SESSION['PWD'],
                    ]);
                    $amounts = $statement->fetchAll();
                    $trueAmount=0;
                    foreach($amounts as $amount){
                        $trueAmount = $amount;
                    }
                    echo $trueAmount[0].'€'; 
                ?>
            </p>
        </div>

        <?php //get the number of rows of the table account what is similar to the number of participants
            
            $sqlQuery = 'SELECT * FROM account WHERE amount_wagered!=0';
            $statement = $mysqlClient->prepare($sqlQuery);
            $statement->execute();
            $nbOfParticipants = $statement->rowCount();
        ?>
        <div class="numberOfParticipantsContainer" style="background-image:url('<?php echo get_field('number_of_participants');?>');">
            <p>Number of participants at the draw:</p>
            <p><?php echo $nbOfParticipants; ?> participant(s)</p>
        </div>

        <div class="BetContainer">
            <a href="<?php echo get_field('play', 'option');?>"><button id="increaseButton" class="pulled" style="width:380px;height:275px; text-align:center;">Increase your chances of winning!</button></a>
        </div>

        <div class="changeSubscriptionContainer">
            <a href="<?php echo get_field('change_subscription', 'option');?>"><button id="changeSubscriptionButton" class="pulled" style="width:380px;height:275px;text-align:center;">Subscribe!</button></a>
        </div>
    </div>
    
<?php get_footer(); ?>