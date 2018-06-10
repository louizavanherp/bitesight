<?php 
    spl_autoload_register(function($class) {
        include_once("../classes/" . $class . ".class.php");
    });

    //create database connection
    $db = Db::getInstance();

    //udpate list 
    $product = new Product($db);


    try{
        //add product to list 
            //check if product is already on list
            if($product->isOnList($_POST['productid'])==1){
                $product->updateList($_POST["productid"], $_POST['quantity']);
            }
            else{
                $product->addProductToList($_POST["productid"], $_POST['quantity']);
            }

        $feedback['status'] = "success";
    }
    catch(Exception $e){
        $feedback['status'] = "error";
    }   

    header("Content-type: application/json");
    echo json_encode($feedback);
?>