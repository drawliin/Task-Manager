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
    <title>Completed Tasks</title>
    <link rel="stylesheet" href="Styles/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <div class="container">
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
        
            
                <div class='task-list'>
                        <?php
                            include('database.php');
                            $userid = $_SESSION['id'];
                            $currentDate = null;

                            $sql = "SELECT * FROM tasks WHERE user_id = '$userid' AND status='completed' ORDER BY completion_date DESC";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                echo "<h2>Completed Tasks</h2>";

                                while($row = $result->fetch_assoc()){
                                    if($row['completion_date'] !== $currentDate){
                                        $currentDate = $row['completion_date'];
                                        echo "<h3>".date('d F Y', strtotime($row['completion_date']))."</h3>";
                                    }
                                    echo "
                                        <div class='task'>
                                                <span class='task-title'>{$row['title']}</span>
                                        </div>";
                                }
                            }
                        ?>
                        
                        
                </div>
    </div>
</body>
</html>