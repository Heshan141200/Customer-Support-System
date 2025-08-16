<?php
   

    session_start();

$error = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];

    $admins = [
        'admin' => 'Password123',   
    ];

    $agent = [
        'csa' => 'Password123',
    ];

    if (array_key_exists($Username, $admins)) {
        if ($admins[$Username] === $Password) {
            $_SESSION['Username'] = $Username;
            
                header('Location: \GP SLIIT\Admin\index.php ');

            exit();
        } else {
            $error[] = "<h1 class='error'>Username or Password is invalid</h1>";
        }
    } elseif (array_key_exists($Username, $agent)) {
        if ($agent[$Username] === $Password) {
            $_SESSION['Username'] = $Username;
            
                header('Location: \GP SLIIT\CSA\index.php');

            exit();
        } else {
            $error[] = "<h1 class='error'>Username or Password is invalid</h1>";
        }
    }

    else {
        require_once './udbcon.php';
        $query = "SELECT * FROM users WHERE Username = '{$Username}' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);

            if (password_verify($Password, $row['Password'])) {
                $_SESSION['User_id'] = $row['User_id'];
                $_SESSION['Username'] = $row['Username'];
                $_SESSION['Email'] = $row['Email'];

                
                header('Location: ./home.php');
                exit();
            } else {
                $error[] = "<h1 class='error'>Username or Password is invalid</h1>";
            }
        } else {
            $error[] = "<h1 class='error'>Username or Password is invalid</h1>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" type="text/css" href="../CSS/login.css">
</head>
<body>
    <div class="left-section">
        <div class="logo"></div>
        <div class="image-place"></div>
        <div class="description">Log in to your account and access our 24/7 support services. Whether you need assistance or want to track your tickets, we’re here to help.</div>
    </div>
    <div class="midline"></div>
    <section id="sign-conta">
        <h1>Welcome!</h1>
        <div class="heading"><h3>Log in</h3></div>
        
        <form action="login.php" method="POST">
            <div class="conten">
                <div class="inside">
                    <input type="text" class="sign-input" placeholder="Username" name="Username"></input>
                </div>
            </div>
            <div class="conten">
                <div class="inside">
                    <input type="password" class="sign-input" placeholder="Password" name="Password"></input>
                </div>
            </div>
            <div class="btn-conten">
                <button type="submit" class="submit-btn" id="log-in" name="log-in">Log in</button>
                <div class="still-acc">Still don't have an Account? <a href="./signup.php"><span>Sign up</span></a></div>
            </div>
        </form>
    </section>
</body>
</html>