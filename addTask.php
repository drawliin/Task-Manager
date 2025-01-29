<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){
        session_start();
        include('database.php');

        $taskInput = $_GET['taskInput'];
        $id = $_SESSION['id'];

        $sql = "INSERT INTO tasks(title, user_id) VALUES ('$taskInput', '$id')";
        try{
            $conn->query($sql);
        }
        catch(Exception $e){
            echo "Error: {$e->getMessage()}";
        }
        header('Location: home.php');
    }
?>