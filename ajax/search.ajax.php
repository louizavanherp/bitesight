<?php
    spl_autoload_register(function($class) {
        include_once("../classes/" . $class . ".class.php");
    });

    //create database connection
    $db = Db::getInstance();

    $product = new Product($db);
    try{
       if(!empty($_POST)){
           if(!empty($_POST['search'])){
               $feedback['products'] = $product->getSearchedItems($_POST['search']);
            }
           $feedback['status'] = "success";
       }
    }catch(Exception $e){
        $feedback['status'] = "error";
    }
    header('Content-type: application/json');
    echo json_encode($feedback);
?>