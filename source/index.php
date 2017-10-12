<?php session_start(); ?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Site bán hàng online</title>
        <link href="assets/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/lightbox2/css/lightbox.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css"/>

        <style type="text/css">
            .title {
                font-family: 'Open Sans';
                font-size: 16pt;
                padding-top: 10px;
                padding-bottom: 10px;
                border-bottom: 1px solid #cccccc;
                margin-bottom: 35px;
            }
        </style>
    </head>
    <body>
        <?php include_once "./inc_top.php"; ?>

        <div class="container-fluid">
            <div class="row">
                <?php
                include_once './inc_left.php';

                if (isset($_GET["act"])) {
                    $act = $_GET["act"];
                    switch ($act) {
                        case "products":
                            include_once './inc_products.php';
                            break;
                        case "details":
                            include_once './inc_details.php';
                            break;

                        case "login":
                            include_once './inc_login.php';
                            break;
                        case "register":
                            include_once './inc_register.php';
                            break;
                        case "profile":
                            include_once './inc_profile.php';
                            break;
                        
                        case "cart":
                            include_once  './inc_cart.php';
                            break;

                        default:
                            include_once './inc_blank.php';
                            break;
                    }
                } else {
                    include_once './inc_blank.php';
                }
                ?>

            </div>
        </div>

        <script src="assets/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="assets/bootstrap-3.3.4-dist/js/bootstrap.min.js" type="text/javascript"></script>
        <?php
        if (isset($js)) {
            echo $js;
        }
        ?>
    </body>
</html>
