<?php
    spl_autoload_register(function($class) {
        include_once("classes/" . $class . ".class.php");
    });

    //create database connection
    $db = Db::getInstance();

    //get fresh products
    $product = new Product($db);
    $products = $product->getFresh();

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

    <main class=container>
        <div class="selectBtn"><a href="#">SELECTEER</a></div>
        <div class="products">
        <?php foreach($products as $p): ?>
        <li class="product__item">
                <div class="product--box">

                    <a href="detail.php?id=<?php echo $p['id'] ?>"><img class="product__image" src="<?php echo $p['image'] ?>" alt="<?php echo $p['title'] ?>"></a>
                    
                    <div class="product__bottom">
                    <a class="product__add" href="#">&#43;</a>
                    <?php if($p['freshness']==1):?>
                        <div class='product__dot product__dot--green'></div>
                        <?php elseif($p['freshness']==2): ?>
                        <div class='product__dot product__dot--orange'></div>
                        <?php else: ?>
                        <div class='product__dot product__dot--red'></div> 
                    <?php endif; ?>
                    </div>

                </div>

                <h2 class="product__title"><?php echo $p['title'] ?></h2>
        </li>
        <?php endforeach; ?>
        </div>
    </main>

    <?php include_once('includes/nav.inc.php') ?>
</body>
</html>