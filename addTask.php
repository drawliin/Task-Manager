<?php

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['addTask'])){
        session_start();
        include('database.php');

        $taskInput = $_GET['taskInput'];
        $id = $_SESSION['id'];

        $sql = "INSERT INTO tasks(title, user_id) VALUES ('$taskInput', '$id')";
        if($conn->query($sql)){
            header('Location: home.php');
        }



    }
?>