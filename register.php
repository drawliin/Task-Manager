<?php
    $nameErr = $emailErr = $existedEmailErr = $passwordErr = $c_passwordErr = '';
    $matched_pass = true;

    if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        include('database.php');

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $matched_pass = $password == $c_password;


        if(empty($name)){
            $nameErr = 'Name is required';
        }
        if(empty($email)){
            $emailErr = 'Email is required';
        }else{
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                $existedEmailErr = 'Email Alreay Exist';
            }
        }
        if(empty($password)){
            $passwordErr = 'Password is required';
        }
        if(!$matched_pass){
            $c_passwordErr = 'Password Not Matched';
        }

        if(!empty($name) && !empty($password) && !empty($email) && !empty($c_password) && $matched_pass && empty($existedEmailErr)){
            $sql = "INSERT INTO users (name, email, pass)
                    VALUES ('$name', '$email', '$password')";
            try{
                $conn->query($sql);
                header('Location: login.php');
            }catch(Exception $e){
                die('Error: '. $e->getMessage());
            }
            $conn->close();

        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel='stylesheet' href='Styles/login-register.css'/>
</head>
<body>
        <div class='container'>
            <h1>Register Page</h1>
            <form method='post'>
                <div class="form-group">
                    <label for='name'>Name: </label>
                    <input type='text' value="<?php echo $_POST['name'] ?? ''?>" placeholder='Your Name...' id='name' name='name'/>
                    <?php if(!empty($nameErr)){echo "<p class='error'>$nameErr</p>";} ?>  
                </div>

                <div class="form-group">
                    <label for='email'>Email: </label>
                    <input type='email' value="<?php echo $_POST['email'] ?? ''?>" placeholder='Email...' id='email' name='email'/> 
                    <?php 
                        if(!empty($emailErr)){
                            echo "<p class='error'>$emailErr</p>";
                        }elseif(!empty($existedEmailErr)){
                            echo "<p class='error'>$existedEmailErr</p>";
                        }
                    ?> 
                </div>

                <div class="form-group">
                    <label for='password'>Password: </label>
                    <input type='password' placeholder='Password...' id='password' name='password'/>
                    <?php if(!empty($passwordErr)){echo "<p class='error'>$passwordErr</p>";} ?>
                    
                </div>
                <div class="form-group">
                    <label for='c_password'>Confirm Password: </label>
                    <input type='password' placeholder='Password...' id='c_password' name='c_password'/>
                    <?php if(!$matched_pass){echo "<p class='error'>$c_passwordErr</p>";} ?>
                    
                </div>

                <input type='submit' name='submit' value='Register' class="submit-btn"/>

                <div class="footer">
                    <p>Already have account? <a href="login.php">Login</a></p>
                </div>
                
            </form>
        </div>
</body>
</html>