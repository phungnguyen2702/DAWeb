<?php

session_start();

require_once './inc_func.php';

if (isAuthenticated()) {
    
    unset($_SESSION["auth"]);
    unset($_SESSION["auth_user"]);

    if (isset($_COOKIE["auth_user_id"])) {
        setcookie("auth_user_id", '', time() - 3600);
    }
}

redirect("index.php");
