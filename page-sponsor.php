<?php
    session_start();

    $_SESSION['sponsor']=true;//variable to know where to go after login

    if(isset($_SESSION['ID'])&&isset($_SESSION['PWD'])){//if the user is logged in
        //display the form to register the sponsored person
        get_header();
        echo '
        <h1 class="signUpTilte">'.get_the_title().'</h1>
        <div id=formContainer>
        <form method = "post" id="sponsorForm">
            <p class=usernameContainer>
                <label for="username-sponsor" >Login</label>
                <input type="text" id="username-sponsor" name="id" required/>
            </p>
            <p class="emailContainer">
                <label for="email-sponsor">Email</label>
                <input type="email" id="email-sponsor" name="email" required/>
            </p>
            <p class="pwdContainer">
                <label for="pwd-sponsor">Provisional password</label>
                <input type="password" id="pwd-sponsor" name="mdp" required/>
            </p>
            <p class="pwdContainer">
                <label for="typeOfSubscription">Subscription</label>
                <select name="typeOfSubscription" id="typeOfSubscription" required>
                    <option value="0">Free</option>
                    <option value="5">5€/month</option>
                    <option value="10">10€/month</option>
                    <option value="30">30€/month</option>
                    <option value="50">50€/month</option>
                    <option value="VIP">100+€/month</option>
                </select>
            </p>
            <button type="sumbit" id="typeOfSubscriptionButton" class="pmfButton" formaction="http://fructicash.local/sponsor-treatment">Sponsor!</button>
        </form>
        </div>';
                
        get_footer();
    }else{//if the user in not logged in
        wp_redirect("http://fructicash.local/sign-in");
        exit();
    }
?>