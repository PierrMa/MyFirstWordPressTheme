<?php
    session_start();
    session_destroy();
    wp_redirect('http://fructicash.local/');
    exit();
?>
