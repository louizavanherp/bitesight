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
    <title>Account</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main class="container container__edit">

        <header>
            <a href="#" class="goBack__btn"><img src="images/icon/back.svg" alt="back"></a>
            <h1 class="edit__title">MIJN GEGEVENS</h1>
        </header>

        <div class="edit__username">
            <img class="edit__username__icon" src="images/icon/login_profile.svg" alt="login">
            <div class="edit__username__txt">
                <p class="edit__username__txt__title">GEBRUIKERSNAAM</p>
                <input class="edit__username__txt__input" type="text" value="<?php echo $userInformation['name'] ?>">
            </div>
            
        </div>

        <div class="edit__email">
            <img class="edit__email__icon" src="images/icon/mail.svg" alt="login">
            <div class="edit__email__txt">
                <p class="edit__email__txt__title">EMAIL</p>
                <input class="edit__email__txt__input" type="text" value="<?php echo $userInformation['email'] ?>">
            </div>
        </div>

        <a href="#" class="edit__save">Opslaan</a>

    </main>

    <footer class="footer footer__edit">
    <?php include_once("includes/nav.inc.php") ?>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>