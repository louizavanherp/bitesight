<?php
    spl_autoload_register(function($class) {
        include_once("classes/" . $class . ".class.php");
    });

    //create database connection
    $db = Db::getInstance();

    //get all products in stock
    $stockItem = new stock($db);
    $stock = $stockItem->getAll();

    //new product object
    $product = new Product($db);

    //add product to list
    //check if user has clicked on add btn
    if(isset($_GET['addHome'])) {
        //get product Id from URL
        $productId = $_GET['addHome'];

        //check if already in database
        if($product->isOnList($productId)==1){
            $product->updateList($productId);
        }
        else{
            $product->addProductToList($productId);
        }
        header("Location: index.php");
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include_once("includes/filter.inc.php") ?>
    
    <main class="container container__home">

        <div class="selectBtn"><a href="#">SELECTEER</a></div>
    
        <div class="products">

        <?php foreach($stock as $item): ?>
        <li class="product__item">
        
                <div class="product--box">

                    <a href="detail.php?id=<?php echo $item['product_id'] ?>&stockId=<?php echo $item['id'] ?>" class="productLink"><img class="product__image" src="<?php echo $item['image'] ?>" alt="<?php echo $item['title'] ?>"></a>
                    <div class="product__bottom">
                    <a class="product__add" data-product="<?php echo $item['product_id'] ?>" href="#"><img src="images/icon/plus.svg" alt="plus"></a>
                    <?php if($item['freshness']==1):?>
                        <div class='product__dot product__dot--green'></div>
                        <?php elseif($item['freshness']==2): ?>
                        <div class='product__dot product__dot--orange'></div>
                        <?php else: ?>
                        <div class='product__dot product__dot--red'></div> 
                    <?php endif; ?>
                    </div>

                </div>

                <?php $productId = $item['product_id']; ?>
                <h2 class="product__title" ><?php echo $item['title'] ?></h2>
        </li>
        <?php endforeach; ?>
        </div>
        <?php include_once("includes/popupHome.inc.php")?>
        <?php include_once("includes/confirmation.inc.php") ?>

    </main>

    <footer>
        <?php include_once("includes/nav.inc.php") ?>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>