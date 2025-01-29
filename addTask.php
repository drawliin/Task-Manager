<?php

    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['addTask']) && !empty($_GET['taskInput'])){
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
            $conn->close();
        }
    header('Location: home.php');
?>