<?php
    spl_autoload_register(function($class) {
        include_once("classes/" . $class . ".class.php");
    });

    //create database connection
    $db = Db::getInstance();

    //get products from list
    $product = new Product($db);
    $listProducts = $product->getItemsFromList();


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

    <main class="container container__shop">
        <header>
            <a href="#" class="goBack__btn"><img src="images/icon/back.svg" alt="back"></a>
            <h1>WINKELLIJST</h1>
        </header>
        <div class='scanProducts__ block'> 
            <a href="#" class="scanProducts__btn">Scan product</a>
        </div>
       <ul class="shopList">
       <?php foreach($listProducts as $p): ?>
        <li class="shop__item">
            <p class="shop__item__title"><?php echo$p['title'] ?></p>
            <div class="shop__item__count">
                <p>1</p>
            </div>
        </li>
       <?php endforeach; ?>
       </ul>
    </main>

    <footer class="pay__info">
        <div class="subtotal">
            <h2 class="subtotal__title">Subtotaal</h2>
            <p class="subtotal__price">€ 14,95</p>
        </div>
        <div class="pay__btn"><a href="#">Betaal</a></div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>