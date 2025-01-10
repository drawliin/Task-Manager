<?php
    $host = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'task_manager';

    try{
        $conn = new mysqli($host, $db_username, $db_password, $db_name);
        if($conn->connect_error){
            throw new Exception('Connection Failed'. $conn->connect_error);
        }
    }catch(Exception $e){
        die('Error :'. $e->getMessage());
    }
        
?>