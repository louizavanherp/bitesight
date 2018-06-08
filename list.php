<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    spl_autoload_register(function($class) {
        include_once($_SERVER["DOCUMENT_ROOT"]. "/bitesight/classes/" . $class . ".class.php");
    });

    //create database connection
    $db = Db::getInstance();

    //get products from list
    $product = new Product($db);
    $listItems =$product->getItemsFromList();

    $stockItem = new Stock($db);
    $stock = $stockItem->getAll();

    //delete items from list 
    if(isset($_GET['delete'])){
        $product->deleteFromList($_GET['delete']);
        header("Location: list.php");
    }
    

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Boodschappenlijst</title>
</head>
<body>
    
    <main class="container container__list">
       <h1>BOODSCHAPPENLIJST</h1> 
       <ul class="shoppingList">
       <?php foreach($listItems as $item): ?>
        <li class="shoppingList__item">
            <p class="shoppingList__item__title"><?php echo $item['title'] ?></p>
            <div class="calc"> 
                <a href="#" class="calc__min" data-id="<?php echo $item['id'] ?>" data-productid="<?php echo $item['product_id'] ?>"><img src="images/icon/min.svg" alt="min"></a>
                <p class="calc__quantity" id="q<?php echo $item['id'] ?>" ><?php echo $product->countItemsList($item['product_id'])['quantity'] ?></p>
                <a href="#" class="calc__plus" data-id="<?php echo $item['id'] ?>" data-productid="<?php echo $item['product_id'] ?>"><img src="images/icon/plus.svg" alt="plus"></a>
            </div>
            <a class="shoppingList__item__deleteBtn" href="list.php?delete=<?php echo $item['product_id'] ?>"><img src="images/icon/trash_red.svg" alt="trash"></a>
        </li>
       <?php endforeach; ?>
       </ul>
       <a href="search.php" class="addProduct__btn">Voeg product toe</a>
    </main>

    <footer class="footer footer__list">
        <a href="shop.php" class="goShopping__btn">Ga winkelen</a>
        <?php include_once("includes/nav.inc.php") ?>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>

</body>
</html>