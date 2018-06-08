<?php

    spl_autoload_register(function($class) {
        include_once("../classes/" . $class . ".class.php");
    });

    //create database connection
    $db = Db::getInstance();

    //create new user 
    $user = new user($db);

    //get user information 
    $password = $user->getUserInformation(1)['password'];

    try{
        //check if fields are not empty
        if($_POST['password'] && $_POST['newPassword'] && $_POST['newPasswordConfirmation'] != "" ){
            //check if password is same  
            if($_POST['password'] == $password){
                //check if new passwords match
                if($_POST['newPassword'] == $_POST['newPasswordConfirmation']){
                    $user->changePassword(1, $_POST['newPassword']);
                    $feedback['status'] = "success";  
                }
            }
        }
        else{
            $feedback['status'] = "error";
        }
    }
    catch(Exception $e){
        $feedback['status'] = "error";
    }
    

    header("Content-type: application/json");
    echo json_encode($feedback);
?>