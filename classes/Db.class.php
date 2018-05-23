<?php

    class Db {

        private static $conn;

        // @return PDO connection
        // -> if exists -> return existing
        // -> if !exists -> return new PDO
        public static function getInstance() {
            if(file_exists("settings/db.php")) {
                include_once("settings/db.php");
            } else {
                include_once("../settings/db.php");
            }
            
            if( self::$conn == null ) {
                self::$conn = new PDO("mysql:host=".$db['host']."; dbname=".$db['dbname'],$db['username'],$db['password']);
                return self::$conn;
            } else {
                return self::$conn;
            }
        }

    }

?>