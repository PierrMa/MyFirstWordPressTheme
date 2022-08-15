<?php 
    get_header();
    echo '<h1 class="signUpTilte">'.get_the_title().'</h1>';
?>

<div id=formContainer>
<form method = "post" id="registerForm" action="http://fructicash.local/registration-error-page">
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
</div>

<?php get_footer() ?>