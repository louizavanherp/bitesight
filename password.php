<?php
     spl_autoload_register(function($class) {
        include_once("classes/" . $class . ".class.php");
    });

    //create database connection
    $db = Db::getInstance();

    //create new user 
    $user = new user($db);

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main class="container container__password">

        <header>
            <a href="#" class="goBack__btn"><img src="images/icon/back.svg" alt="back"></a>
            <h1 class="password__title">WACHTWOORD</h1>
        </header>

        <section class="password">

        <input class="password__currentPw passwordInput" type="text" placeholder="Huidig wachtwoord">
        <input class="password__newPw passwordInput" type="text" placeholder="Nieuw wachtwoord">
        <input class="password__confirmPw passwordInput" type="text" placeholder="Bevestig nieuw wachtwoord">


        <a href="#" class="password__save">Opslaan</a>

        </section>

    </main>

    <footer class="footer footer__edit">
    <?php include_once("includes/nav.inc.php") ?>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>