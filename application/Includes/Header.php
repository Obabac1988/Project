<?php



include('Arrays.php'); ?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <title>RockFestival</title>
    <meta name="description" content="Rock Festival this year">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <link rel="icon" href="../Images/rockicc.jpg">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/style2.css">


</head>
<body id="body" class="bk-night">
<div>

    <div class="menu">
        <div class="exp">
            <button class="btn-toggle navbar-toggler" type="button">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </button>
        </div>
    </div>
    <nav class="navbar navbar-expand-sm navbar-dark">
        <a class="navbar-brand" href="../home.php"><img src="../Images/Logobaner.png"></a>
        <div id="menu" class="collapse navbar-collapse  ">
            <?php include('navbar.php'); ?>
        </div>
        <div class="btn btn-auth">
            <form method="post" action="../index.php?controller=AuthController&action=registerhtml" class="form-mine">
                    <input type="submit" value="Sign Up" class="btn btn-outline-primary">
            </form>
            <form method="post" action="../index.php?controller=AuthController&action=loginhtml" class="form-mine">
                <input type="submit" value="Sign In" class="btn btn-outline-primary">
<!--                            <input class="btn-outline-primary btn" type="submit" name="login" value="Login">-->
            </form>
<!--            --><?php
//                        if (isset($_GET['register'])) {
//                            $register = new LoginController();
//                            $register->registerhtml();
//                        }
//                        if (!empty($_GET['login'])) {
//                            $login = new LoginController();
//                            $login->loginhtml();
//                        }
//
//            ?>
        </div>
    </nav>
</div>
