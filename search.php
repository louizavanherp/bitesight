<?php
    spl_autoload_register(function($class) {
        include_once("classes/" . $class . ".class.php");
    });

    //create database connection
    $db = Db::getInstance();

    //get products from list
    $product = new Product($db);
    


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Shop</title>
</head>
<body>

    <main class="container container__search">
        <div class="search__field">
            <div class="search__field__part1">
            <img class="search__field__icon" src="images/icon/search.svg" alt="">
            <input class="search__field__input" name="search" type="text" placeholder="Zoek product...">
            </div>
            <p class="search__field__cross">&#x2715;</p>
        </div>
       

        <div class="search__results">
        </div>
    </main>

    <footer>
        <?php include_once("includes/nav.inc.php") ?>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>