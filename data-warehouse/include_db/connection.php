<?php
require_once(dirname(__DIR__)."/include_db/include_db.php");
class Connect_db
{
    function connectDatabase(){
        $conn = mysqli_connect("localhost",DB_USER,DB_PASS,DB_NAME);
        
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        return $conn;
    }
}