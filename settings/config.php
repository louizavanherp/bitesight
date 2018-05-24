<?php
        // Check website is local
        if($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "localhost:8888" || $_SERVER['HTTP_HOST'] == "127.0.0.1:5500") {
            include_once("db.php");
        }
        //if website is online
        else{
            include_once("db.prod.php");
        }

?>