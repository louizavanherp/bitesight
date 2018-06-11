<?php 
    spl_autoload_register(function($class) {
        include_once("../classes/" . $class . ".class.php");
    });

    //create database connection
    $db = Db::getInstance();

    //udpate list 
    $product = new Product($db);

    try{
        $product->deleteFromList($_POST['productid']);
        $feedback['status'] = "success";
    }
    catch(Exception $e){
        $feedback['status'] = "error";
    }   

    header("Content-type: application/json");
    echo json_encode($feedback);
?>