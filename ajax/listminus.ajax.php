<?php
    spl_autoload_register(function($class) {
        include_once("../classes/" . $class . ".class.php");
    });

    //create database connection
    $db = Db::getInstance();

    $product = new Product($db);
    $product->updateListMin($_POST['productId']);

    try{
        $quantity = $_POST['quantity'];
        if($quantity >0){
            $feedback['quantity'] = --$quantity;
        }
        $feedback['listId'] = $_POST['listId'];
        $feebdack['status'] = "success";
        
    }
    catch(Exception $e){
        $feebback['status'] = "error";
    }


    header("Content-type: application/json");
    echo json_encode($feedback);
?>