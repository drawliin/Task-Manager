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
                    <div>
                        <button>
                    </div>
            </div>

            <div class="add-task">
                <input type="text" id="taskInput" placeholder="Create new task" />
                <button id="addTaskButton">+</button>
            </div>

            <div class='task-list'>
                <h2>Tasks To Complete</h2>
                <div class="task">
                    <input type="checkbox" />
                    <span class="task-title">Jogging</span>
                </div>
                
            </div>
        </div>

    </div>
</body>
</html>