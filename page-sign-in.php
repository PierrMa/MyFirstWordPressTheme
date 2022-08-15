<?php
    /*
        2 possible behaviors:
        1: The credentials entered are correct -> display the page 'My account'
        2: The credentials are wrong -> display a page with an error message and a authentification box
    */

    //check the login and the password
    if (isset($_POST['id']) &&  isset($_POST['mdp'])) {
        foreach ($users as $user) {
            if (
                $user['id'] === $_POST['id'] &&
                $user['mdp'] === $_POST['mdp']
            ) {
                $loggedUser = [
                    'id' => $user['id'],
                ];
            } else {
                $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                    $_POST['id'],
                    $_POST['mdp']
                );
            }
        }
    }
    //display a page with an error message and a authentification box 
?>