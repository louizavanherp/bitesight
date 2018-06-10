<?php
    spl_autoload_register(function($class) {
        include_once("classes/" . $class . ".class.php");
    });

    //create database connection
    $db = Db::getInstance();

    //create new user 
    $user = new User($db);

    //get user information 
    $userInformation = $user->getUserInformation(1);  

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Inventaris</title>
</head>
<body>
    <main class="container container__graphic">
        <h1>DASHBOARD</h1>
        <H2 class="graphic__txt">Welkom terug <?php echo $userInformation['name'] ?></h2>
        <img class="graphic__image" src="images/dashboard.png" alt="dashboard">
    </main>

    <footer class="footer footer__graphic">
        <?php include_once("includes/nav.inc.php") ?>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>