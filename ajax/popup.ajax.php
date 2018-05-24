<?php
    spl_autoload_register(function($class) {
        include_once("../classes/" . $class . ".class.php");
    });

    //create database connection
    $db = Db::getInstance();

    $product = new Product($db);
    $productInfo = $product->getProductInfo($_POST['product']);

    $title = $productInfo['title'];

    try{
        $feedback['title'] = $title;
        $feedback['product'] = $_POST['product'];
        $feedback['status'] = "success";
    }
    catch(Exception $e){
        $feedback['status'] = "error";
    }

    header("Content-type: application/json");
    echo json_encode($feedback);
?>