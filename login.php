<?php
    $emailErr = $passwordErr = '';
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
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                session_start();
                $_SESSION['name'] = $row['name'];
                header('Location: index.php');
            }else{
                die('Incorrect Login');
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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color:#e2e2e2; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .login-container {
            background-color: #FFFFFF; 
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            width: 40%;
            max-width: 520px;
            transition: transform 0.3s ease-in-out;
        }
        .login-container h1{
            font-size: 35px;
            font-weight: 800;
            text-align: center;
            margin-bottom: 10px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 5px;
            color: #7F7F7F; 
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #D9D9D9; 
            border-radius: 5px;
            background-color: #F7F7F7; 
            color: #333;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            border-color: #BFBFBF; 
            outline: none;
        }

        .submit-btn {
            padding: 12px;
            font-size: 16px;
            background-color: #000000; 
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #7F7F7F; 
        }

       
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(-50px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .login-container {
            animation: fadeIn 0.8s ease-out;
        }

        .footer {
            margin-top: 15px;
            font-size: 14px;
            color:rgb(73, 73, 73);
        }

        .footer a {
            color: #9AA6B2;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
        
    </style>
</head>
<body>
    
    <div class='login-container'>
        <h1>Login Page</h1>
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
                <p>Don't have account? <a href="#">Register</a></p>
            </div>
            
        </form>
    </div>

</body>
</html>

