<?php
    
    include "./udbcon.php";

    $error = array();

    if(isset($_POST['sign-up'])) {
        $F_name = mysqli_real_escape_string($conn, $_POST['F_name']);
        $L_name = mysqli_real_escape_string($conn, $_POST['L_name']);
        $Email = mysqli_real_escape_string($conn, $_POST['Email']);
        $Username = mysqli_real_escape_string($conn, $_POST['Username']);
        $Password = mysqli_real_escape_string($conn, $_POST['Password']);
        $Age = mysqli_real_escape_string($conn, $_POST['Age']);
        
        $query = "SELECT * FROM users WHERE Username = '{$Username}' LIMIT 1";
        $res = mysqli_query($conn, $query);
        
        if ($res && mysqli_num_rows($res) == 1) {
            $error[] = 'Username has already been taken';
        } else {
            
            $Password = password_hash($Password, PASSWORD_BCRYPT);

            $query = "INSERT INTO users (F_name,L_name, Email, Username, Password,Age) 
                      VALUES ('{$F_name}','{$L_name}', '{$Email}', '{$Username}', '{$Password}','{$Age}')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                header('Location: home.php');
                exit(); 
            } else {
                $error[] = 'Failed to add the record';
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up</title>
    <link rel="stylesheet" type="text/css" href="../CSS/signup.css">
    <script src="./JS/signup.js"></script>
</head>
<body>
    <div class="left-section">
        <div class="logo"></div>
        <div class="image-place"></div>
        <div class="description">Welcome to Supportify! Log in to manage your support tickets or sign up to access personalized assistance. We're here to help, every step of the way!</div>
    </div>
    <div class="midline"></div>
    <section id="sign-conta">
        <h1>Welcome!</h1>
        <div class="heading"><h3>Sign Up</h3></div>

        
        <form action="signup.php" method="POST">
            <div class="conten">
                <div class="inside">
                    <input type="text" class="sign-input" placeholder="First Name" name="F_name"></input>
                </div>
            </div>

            <div class="conten">
                <div class="inside">
                    <input type="text" class="sign-input" placeholder="Last Name" name="L_name"></input>
                </div>
            </div>

            <div class="conten">
                <div class="inside">
                    <input type="email" class="sign-input" placeholder="Email" name="Email"></input>
                </div>
            </div>
            <div class="conten">
                <div class="inside">
                    <input type="text" class="sign-input" placeholder="Username" name="Username"></input>
                </div>
            </div>
            <div class="conten">
                <div class="inside">
                    <input type="password" id="pw" class="sign-input" placeholder="Password" name="Password"></input>
                </div>
                <div class="conten">
                <div class="inside">
                    <input type="text" class="sign-input" placeholder="Age" name="Age"></input>
                </div>
            </div>
            </div>
            <div class="btn-conten">
                <button type="submit" class="submit-btn" id="sign-up" name="sign-up">Sign Up</button>
                <div class="alredy-acc">Already have an account <a href="./login.php"><span>Log in</span></a></div>
            </div>
        </form>
    </section>
</body>
</html>