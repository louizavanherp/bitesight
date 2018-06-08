<?php
    spl_autoload_register(function($class) {
        include_once("../classes/" . $class . ".class.php");
    });

    //create database connection
    $db = Db::getInstance();

    try
    {
        $feedback['email'] = $_POST['email'];
        $feedback['status'] = "success";
    }
    catch(Exception $e){
        $feedback['status'] = "error";
    }

    header("Content-type: application/json");
    echo json_encode($feedback);
?>