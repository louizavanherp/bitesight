<?php
     spl_autoload_register(function($class) {
        include_once("classes/" . $class . ".class.php");
    });

    //create database connection
    $db = Db::getInstance();

    //create new user 
    $user = new user($db);

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
    <main class="container container__account">

        <h1 class="account__title">MIJN PROFIEL</h1>

        <div class="account__basicInformation">
            
            <div class="account__basicInformation__details">
                <h2 class="account__basicInformation__details__name"><?php echo $userInformation['name']; ?></h2>
                <p class="account__basicInformation__details__email"><?php echo $userInformation['email']; ?></p>
            </div>

            <a href="edit.php" class="account__basicInformation__icon"><img src="images/icon/edit_yellow.svg" alt="edit pencil"></a>
        </div>

        <div class="account__changePassword">
            <a class="account__changePassword__link" href="password.php">WACHTWOORD VERANDEREN</a>
        </div>

        <div class="account__household">
            <p class="account__household__title">Huishouden samenstellen</p>
            <div class="account__household__newMember">
                <img src="images/icon/add_people.svg" alt="add people">
                <div class="account__household__newMember__submit">
                    <input class="account__household__newMember__submit__input" type="text" name="addMember" placeholder="Email familielid">
                    <a href="#" class="account__household__newMember__submit__link"><img src="images/icon/submit_arrow.svg" alt="submit"></a>
                </div>
                
            </div>
            <ul class="account__household__members">
            </ul>
        </div>

        <a href="#" class="account__invitation">Verstuur uitnodiging </a>
    </main>

    <footer class="footer footer__account">
    <?php include_once("includes/confirmationInvitation.inc.php") ?>
    <?php include_once("includes/nav.inc.php") ?>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>