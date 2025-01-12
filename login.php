<?php
    session_start();
    session_destroy();

    $emailErr = $passwordErr = $credentialsErr = '';
    if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($email)){
            $emailErr = 'Email is required';
            
        }
        if(empty($password)){
            $passwordErr = 'Password is required';
        }
        if(!empty($email) && !empty($password)){
            include('database.php');
            $sql = "SELECT * FROM users WHERE email = '$email' and pass='$password'";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                session_start();
                $_SESSION['name'] = $row['name'];
                header('Location: index.php');
            }else{
                $credentialsErr = "Incorrect email or password";
            }
            
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel='stylesheet' href='Styles/login-register.css'/>
</head>
<body>
    
    <div class='container'>
        <h1>Login Page</h1>
        <?php if(!empty($credentialsErr)){echo "<p class='credentials'>$credentialsErr</p>";} ?>
        <form method='post'>
            <div class="form-group">
                <label for='email'>Email: </label>
                <input type='email' placeholder='Email...' id='email' name='email'/>
                <?php if(!empty($emailErr)){echo "<p class='error'>$emailErr</p>";} ?>
            </div>

            <div class="form-group">
                <label for='password'>Password: </label>
                <input type='password' placeholder='Password...' id='password' name='password'/>
                <?php if(!empty($passwordErr)){echo "<p class='error'>$passwordErr</p>";} ?>
            </div>

            <input type='submit' name='submit' value='Enter' class="submit-btn"/>

            <div class="footer">
                <p>Forgot your password? <a href="#">Reset it here</a>.</p>
                <p>Don't have account? <a href="register.php">Register</a></p>
            </div>
            
        </form>
    </div>

</body>
</html>

