<?php
    session_start();

    if(!isset($_SESSION['name'])){
        session_destroy();
        header('Location: login.php');
        exit();
    }

    if(isset($_GET['log-out'])){
        session_destroy();
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="Styles/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class='container'>

        <?php
            include('component/sidebar.php');
        ?>

        <div class='content'>
            <div class='info-container'>
                    <div>
                        <h2>Good Morning, <?php echo "{$_SESSION['name']}"?></h2>
                        <p><?php echo Date('l, d F Y')?></p>
                    </div>
            </div>

            <form class="add-task" action='addTask.php' method='GET'>
                <input type="text" id="taskInput" placeholder="Create new task" name='taskInput'/>
                <button id="addTaskButton" name='addTask'>+</button>
            </form>

            <div class='task-list'>
                <?php
                    include('database.php');
                    $userid = $_SESSION['id'];
                    $sql = "SELECT * FROM tasks WHERE user_id = '$userid' AND status='pending'";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        echo "<h2>Tasks To Complete</h2>";

                        echo "<form method='GET'>";
                        while($row = $result->fetch_assoc()){
                            echo "
                                <div class='task'>
                                        <input type='checkbox' value='{$row['id']}' name='checked_task' onChange='this.form.submit()'/>
                                        <span class='task-title'>{$row['title']}</span>
                                </div>";
                        }
                        echo "</form>";
                    }

                    if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['checked_task'])){
                        $taskId = intval($_GET['checked_task']);
                        $updateQuery = "UPDATE tasks SET status = 'completed', completion_date = CURRENT_DATE() WHERE id = $taskId";
                        try{
                            $conn->query($updateQuery);
                        }catch(Exception $e){
                            echo "alert({$e->getMessage()})";
                        }
                        header("Location: {$_SERVER['PHP_SELF']}");
                    }
                ?>
                
                
            </div>
        </div>

    </div>
</body>
</html>