<?php
    session_start();
    echo "Hello {$_SESSION['name']}";
    if(isset($_GET['log-out'])){
        session_destroy();
        header('Location: login.php');
    }
?>

<form method='get'>
    <button name='log-out'>Logout</button>
</form>