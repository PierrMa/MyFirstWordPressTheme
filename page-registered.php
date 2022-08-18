<?php get_header(); ?>

<!-- Get the date of the deadline -->
<input type="hidden" id="deadline" value="<?php the_field('date_of_the_deadline');?>" />

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

            <a href="<?php echo get_field('play');?>"><input type="button" value="Play!" id="playButton"/></a>
        </div>

        <div id="account-CurrentEventContainer" style="background-image:url('<?php echo get_field('event_image');?>');">
            <a href="<?php echo get_field('participate');?>"><input type="button" value="Participate!" id="participateButton"/></a>
        </div>

        <div class="amountBetContainer" style="background-image:url('<?php echo get_field('bet_image');?>');">
            <p>Amount bet at the draw:</p>
            <p>1456 €</p>
        </div>

        <div class="numberOfParticipantsContainer" style="background-image:url('<?php echo get_field('number_of_participants');?>');">
            <p>Number of participants at the draw:</p>
            <p>1500 participants</p>
        </div>

        <div class="BetContainer">
            <a href="<?php echo get_field('play');?>"><button id="increaseButton" class="pulled" style="width:380px;height:275px; text-align:center;">Increase your chances of winning!</button></a>
        </div>

        <div class="changeSubscriptionContainer">
            <a href="<?php echo get_field('change_subscription');?>"><button id="changeSubscriptionButton" class="pulled" style="width:380px;height:275px;text-align:center;">Change Subscription</button></a>
        </div>
    </div>
    
<?php get_footer(); ?>