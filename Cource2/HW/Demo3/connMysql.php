<?php
    $db_host = "localhost";
    $db_username = "root";
    $db_password = "zxc741963";
    $db_name = "phpboard";

    try{
        $db_link = new PDO("mysql:host={$db_host};dbname={$db_name};charset=utf8", $db_username, $db_password);
    }catch (PDOException $e){
        print("Connection failed, error message: {$e->getMessage()}<br/>");
        die();
    }
