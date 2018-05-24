<?php
    spl_autoload_register(function($class) {
        include_once("classes/" . $class . ".class.php");
    });

    // create database connection
    $db = Db::getInstance(); 

    // get product id
    $productId = $_GET['id'];

    //create product object
    $product = new Product($db);

    //get product info
    $productInfo = $product->getProductInfo($productId);

    //delete product
        //check if user has clicked on delete btn
        if(isset($_GET['delete'])) {
            $product->deleteProduct($productId);
            header("Location: index.php");
        }
    
    //add product to list 
        //check if user has clicked on add btn
        if(isset($_GET['addDetail'])) {
            $product->addProductToList($productId);
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
    <main class="container container__detail">
        <header>
            <a href="#" class="goBack__btn"><img src="images/icon/back.svg" alt="back"></a>
            <h1><?php echo $productInfo['title'] ?></h1>
        </header>
        <section class="container__detail__productInformation">
            <img class="productInformation__img" src="<?php echo $productInfo['image'] ?>" alt="">

            <div class="productInformation__expiration">

                <?php if($productInfo['freshness']==1):?>
                    <p class="productInformation__expiration__txt productInformation__expiration__txt--green">Product is vers</p>
                    <?php elseif($productInfo['freshness']==2):?>
                    <p class="productInformation__expiration__txt productInformation__expiration__txt--orange">Product is nog eetbaar</p>
                    <?php else: ?>
                    <p class="productInformation__expiration__txt productInformation__expiration__txt--red">Opgelet! Product vervalt bijna</p>
                <?php endif; ?>

                <div class="productInformation__expiration__color">
                    <?php if($productInfo['freshness']==1):?>
                        <div class='product__dot product__dot--green'></div>
                        <?php elseif($productInfo['freshness']==2):?>
                        <div class='product__dot product__dot--orange'></div>
                        <?php else: ?>
                        <div class='product__dot product__dot--red'></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="productInformation__details">
                <h1 class="productInformation__details__title"><?php echo $productInfo['title'] ?></h1>
                <p class="productInformation__details__date"><?php echo date("d/m/Y", strtotime($productInfo['date'])) ?></p>
            </div>

            <div class="productInformation__actions">
                <a href="#" class="productInformation__actions__add"><img src="images/icon/add_list.svg" alt="add list"></a>
                <a href="#" class="productInformation__actions__eat" ><img src="images/icon/cookie.svg" alt="cookie"></a>
                <a href="#" class="productInformation__actions__delete"><img src="images/icon/trash.svg" alt="trash"></a>
            </div>

        </section>
    </main>

    <footer class="footer__detail">
        <?php include_once("includes/editEat.inc.php")?>
        <?php include_once("includes/editDelete.inc.php")?>
        <?php include_once("includes/popupDetail.inc.php") ?>
        <?php include_once("includes/nav.inc.php") ?>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>