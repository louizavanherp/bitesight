<?php

    spl_autoload_register(function($class) {
        include_once("../classes/" . $class . ".class.php");
    });

    //create database connection
    $db = Db::getInstance();

    //create new user 
    $user = new User($db);

    try{
        //edit information 
        $user->editInformation(1, $_POST['name'], $_POST['email']);
        $feedback['status'] = "success";
    }
    catch(Exception $e){
        $feedback['status'] = "error";
    }
    

    header("Content-type: application/json");
    echo json_encode($feedback);
?>