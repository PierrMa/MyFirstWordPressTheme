<?php get_header(); ?>

<?php
    //check if the users exist already
    if(!(username_exists($_POST['username-sign-up']) & email_exists($_POST['email-sign-up']))){//if this credential are not used already
        wp_create_user( $_POST['username-sign-up'], $_POST['pwd-sign-up'], $_POST['email-sign-up'] );//register the user
        echo "<br><br><p id='registrationErrorMessage'>Congratulation!!! You've been successfully registered!";//echo a congratulation message
        echo "<br><br>Click on the button below to go to your account</p><br><br>
        <form action='http://fructicash.local/mon-compte' method='post' id='yourAccountForm'>
            <input type='hidden' name='username-registration' value='".$_POST['username-sign-up']."'/>
            <button type='submit' id='yourAccountButton'>Your Account</button>
        </form>";
    }else{
        echo '
        <h1 class="signUpTilte">Sign up</h1>
        <p id="registrationErrorMessage">There is already an account associated with this email and this login</p>
        <div id=formContainer>
        <form method = "post" id="registerForm">
            <p class=usernameContainer>
                <label for="username-sign-up" >Login</label>
                <input type="text" id="username-sign-up" name="username-sign-up"/>
            </p>
            <p class="emailContainer">
                <label for="email-sign-up">Email</label>
                <input type="email" id="email-sign-up" name="email-sign-up"/>
            </p>
            <p class="pwdContainer">
                <label for="pwd-sign-up">Password</label>
                <input type="password" id="pwd-sign-up" name="pwd-sign-up"/>
            </p>
            <button type="sumbit" id="sumbit-sign-up">Register!</button>
        </form>
        </div>';
    }
?>

<?php get_footer() ?>

