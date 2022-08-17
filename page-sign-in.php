<?php
    /*
        2 possible behaviors:
        1: The credentials entered are correct -> display the page 'My account'
        2: The credentials are wrong -> display a page with an error message and a authentification box
    */

    session_start();

    //check the login and the password
    if(isset($_POST['id']) && isset($_POST['mdp'])){//if the field are not empty
        $login = htmlspecialchars($_POST['id']);
        $_SESSION['ID']=$login;
        $password =  htmlspecialchars($_POST['mdp']);
        $_SESSION['PWD']=$password;

        $check = wp_authenticate( $login, $password );

        if(!is_wp_error($check)) {//if the credentials are valid
            $user_login = $check->user_login;
            header('Location: mon-compte?id='.$user_login);//redirect the users to its account
            exit();
        } else {//otherwise display the form again
            get_header();
            echo '<h1 class="signUpTilte">'.get_the_title().'</h1>';
            echo '<p id="registrationErrorMessage">Invalid login credentials.</p>
            <div id=formContainer>
            <form method = "post" id="registerForm">
                <p class=usernameContainer>
                    <label for="username-sign-up" >Login</label>
                    <input type="text" id="username-sign-up" name="id" required/>
                </p>
                <p class="pwdContainer">
                    <label for="pwd-sign-up">Password</label>
                    <input type="password" id="pwd-sign-up" name="mdp" required/>
                </p>
                <button type="sumbit" id="sumbit-sign-up">Sign In!</button>
            </form>
            </div>';
         get_footer();}
    }else{//otherwise we stay on the sign in page
        get_header();
        echo '<h1 class="signUpTilte">'.get_the_title().'</h1>';
        echo 
        '<div id=formContainer>
        <form method = "post" id="registerForm">
            <p class=usernameContainer>
                <label for="username-sign-up" >Login</label>
                <input type="text" id="username-sign-up" name="id" required/>
            </p>
            <p class="pwdContainer">
                <label for="pwd-sign-up">Password</label>
                <input type="password" id="pwd-sign-up" name="mdp" required/>
            </p>
            <button type="sumbit" id="sumbit-sign-up">Sign In!</button>
        </form>
        </div>';
        get_footer();
    }
?>