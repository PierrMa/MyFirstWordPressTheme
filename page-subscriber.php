<?php 
    session_start();
    try
    {
        $mysqlClient = new PDO('mysql:host=localhost;dbname=local;charset=utf8;port=10011', 'root', 'root');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    get_header(); 
?>

<p style="color:red;font-size:1.5rem;with=100%;text-align:center;font-weight:500;">Bienvenu sur ton compte <?php echo $_SESSION['ID'];?></p><!-- Welcoming message -->

<div class="accountSectionContainer">

    <div id="histogramContainer">
        <?php
            echo"<img src='http://fructicash.local/histogram'/>"   
        ?>
    </div>

    <div class="amountBetContainer" style="background-image:url('<?php echo get_field('bet_image');?>');">
        <p>My subscription:</p>
        <p>
            <?php 
                $sqlQuery = 'SELECT subscription_price FROM account WHERE user_login = :id AND user_pass =:pwd';
                $statement = $mysqlClient->prepare($sqlQuery);
                $statement->execute([
                    'id'=>$_SESSION['ID'],
                    'pwd'=>$_SESSION['PWD'],
                ]);
                $amount = $statement->fetchAll();
                echo '<strong>'.$amount[0][0].'</strong>€/month'; 

                $percentageOnSponsored=0;
                if($amount[0][0]==2||$amount[0][0]==5||$amount[0][0]==10){
                    $percentageOnSponsored=$amount[0][0];
                }elseif($amount[0][0]==30){
                    $percentageOnSponsored=15;
                }elseif($amount[0][0]==50){
                    $percentageOnSponsored=20;
                }
            ?>
        </p>
        <p>
            Means <strong><?php echo $percentageOnSponsored; ?></strong>% on the subscription of each of the person you sponsored!
        </p>
    </div>

    <?php //get the number of sponsored people by the user
        $sqlQuery= 'SELECT number_of_sponsored_2,number_of_sponsored_5,number_of_sponsored_10,number_of_sponsored_30,number_of_sponsored_50,number_of_sponsored_VIP FROM account WHERE user_login = :id AND user_pass =:pwd';
        $sqlResponse = $mysqlClient->prepare($sqlQuery);
        $sqlResponse ->execute([
            'id'=>$_SESSION['ID'],
            'pwd'=>$_SESSION['PWD'],
        ]);
        $sponsoredPeople = $sqlResponse -> fetchAll();
        $numOfSponsoredPeople = array_sum([$sponsoredPeople[0]['number_of_sponsored_2'],$sponsoredPeople[0]['number_of_sponsored_5'],$sponsoredPeople[0]['number_of_sponsored_10'],$sponsoredPeople[0]['number_of_sponsored_30'],$sponsoredPeople[0]['number_of_sponsored_50'],$sponsoredPeople[0]['number_of_sponsored_VIP']]);
    ?>
    <div class="numberOfParticipantsContainer" style="background-image:url('<?php echo get_field('number_of_participants');?>');">
        <p>Number of people you sponsored :</p>
        <p><?php echo $numOfSponsoredPeople; ?></p>
    </div>

    <div class="BetContainer">
        <a href="<?php echo get_field('sponsor', 'option');?>"><button id="increaseButton" class="pulled" style="width:380px;height:275px; text-align:center;">Sponsor!</button></a>
    </div>

    <div class="changeSubscriptionContainer">
        <a href="<?php echo get_field('change_subscription', 'option');?>"><button id="changeSubscriptionButton" class="pulled" style="width:380px;height:275px;text-align:center;">Change Subscription!</button></a>
    </div>
</div>
    
<?php get_footer(); ?>