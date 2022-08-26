<?php 
    get_header(); 
    echo '<h1 class="signUpTilte">'.get_the_title().'</h1>';
?>
<div class="formulaContainer">
    <div class='formulaBox'>
        <h3>2€/month</h3>
        <h4>Advantages</h4>
        <p>2% on the subbscription of each people you sponsored</p>
        <p>2% of discount on each participation in the draw</p>
        <h4>Bonus</h4>
        <p>+2€ for each 50 people sponsored</p>
        <form method="post">
            <input type='hidden' value='2' name='fee'/>
            <button type="sumbit" formaction="http://fructicash.local/subscription-treatment/" id="subscribeButton2" class="subscribeButton"> Subscribe! </button>
        </form>
    </div>

    <div class='formulaBox'>
        <h3>5€/month</h3>
        <h4>Advantages</h4>
        <p>5% on the subscription of each people you sponsored</p>
        <p>5% of discount on each participation in the draw</p>
        <h4>Bonus</h4>
        <p>+5€ for each 20 people sponsored that pay at least a subscription of 5€/month</p>
        <form method="post">
            <input type='hidden' value='5' name='fee'/>
            <button type="sumbit" formaction="http://fructicash.local/subscription-treatment/" id="subscribeButton5" class="subscribeButton"> Subscribe! </button>
        </form>
    </div>

    <div class='formulaBox'>
        <h3>10€/month</h3>
        <h4>Advantages</h4>
        <p>10% on the subscription of each people you sponsored</p>
        <p>10% of discount on each participation in the draw</p>
        <h4>Bonus</h4>
        <p>+10€ for each 10 people sponsored that pay at least a subscription of 10€/month</p>
        <form method="post">    
            <input type='hidden' value='10' name='fee'/>
            <button type="sumbit" formaction="http://fructicash.local/subscription-treatment/" id="subscribeButton10" class="subscribeButton"> Subscribe! </button>
        </form>
    </div>

    <div class='formulaBox'>
        <h3>30€/month</h3>
        <h4>Advantages</h4>
        <p>15% on the subscription of each people you sponsored</p>
        <p>30% of discount on each participation in the draw</p>
        <h4>Bonus</h4>
        <p>+30€ for each 10 people sponsored that pay at least a subscription of 30€/month</p>
        <form method="post">
            <input type='hidden' value='30' name='fee'/>
            <button type="sumbit" formaction="http://fructicash.local/subscription-treatment/" id="subscribeButton30" class="subscribeButton"> Subscribe! </button>
        </form>
    </div>

    <div class='formulaBox'>
        <h3>50€/month</h3>
        <h4>Advantages</h4>
        <p>20% on the subscription of each people you sponsored</p>
        <p>50% of discount on each participation in the draw</p>
        <h4>Bonus</h4>
        <p>+50€ for each 10 people sponsored that pay at least a subscription of 50€/month</p>
        <form method="post">
            <input type='hidden' value='50' name='fee'/>
            <button type="sumbit" formaction="http://fructicash.local/subscription-treatment/" id="subscribeButton50" class="subscribeButton"> Subscribe! </button>
        </form>
    </div>

    <div class='formulaBox'>
        <h3>100+€/month</h3>
        <h4>Advantages</h4>
        <p>30% on the subscription of each people you sponsored</p>
        <p>One free participation and 50% of discount on each other participation in the draw</p>
        <p>10% of the total amount wagered for the person who have paid the most expensive subscription<p>
        <h4>Bonus</h4>
        <p>+120€ for each 4 people sponsored that is a VIP</p>
        <form method="post">
            <input type='hidden' value='100' name='fee'/>
            <button type="sumbit" formaction="http://fructicash.local/subscription-treatment/" id="subscribeButtonVIP" class="subscribeButton"> Subscribe! </button>
        </form>
    </div>
</div>
<? get_footer();?>