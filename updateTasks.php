<?php
    include('database.php');

    if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['checked_task'])){
        $taskId = intval($_GET['checked_task']);
        $updateQuery = "UPDATE tasks SET status = 'completed', completion_date = CURRENT_DATE() WHERE id = $taskId";
        try{
            $conn->query($updateQuery);
        }catch(Exception $e){
            echo "Error: {$e->getMessage()}";
        }
    }
?>