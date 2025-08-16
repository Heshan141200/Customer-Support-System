<?php include('./udbcon.php'); ?>

<?php

    session_start();

    if (!isset($_SESSION['User_id'])) {
        header("Location: login.php");
     exit();
    }
    if (isset($_POST["subbtn"])) {
        $User_id = $_SESSION['User_id'];

        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $attachment = mysqli_real_escape_string($conn, $_POST['attachment']);
        

        $query = "INSERT INTO ticket(User_id,title,description,category,attachment) VALUES ('$User_id','$title','$description','$category','$attachment')";
        $res = mysqli_query($conn,$query);

        if($res) {
            echo "<script>myFunction()</script>";
            header('Location: ticketpage.php');
        } else {
            echo "<script>myErrorFunction()</script>";
            header('Location: ticketpage.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
    <link rel="stylesheet" type="text/css" href="../CSS/ticketpage.css">
    <link rel="stylesheet" type="text/css" href="../CSS/navbar.css">
    <script src="../JS/navbar.js" defer></script>
    <link rel="stylesheet" type="text/css" href="../CSS/footer.css">
    <script src="../JS/footer.js" defer></script>
    <script>
        function myFunction() {
            alert('You have successfully sent a Ticket!');
        }
        function myErrorFunction() {
            alert('There might be a problem. Please check and try again!');
        }
    </script>
</head>
<body>
    <header>
        <div id="logo"><img src="\GP SLIIT\CSA\download.jpeg"width=50px length=25px></div>
        <div id="navbar-placeholder"></div>
    </header>
    <div class="below">
        <div class="left-section">
            <div class="container">
                <div class="ticket">   
                    <form method="POST" action="./ticketpage.php">
                        <fieldset>
                            <legend>New Ticket</legend><br>

                            <label for="title">Issue Title</label><br>
                            <input type="text" id="title" name="title"><br><br>

                            <label for="description">Description</label><br>
                            <textarea id="description" name="description"></textarea><br><br>

                            <label for="category">Category</label><br>
                            <select id="category" name="category">
                                <option value="technical-support">Technical Support</option>
                                <option value="human-resources">Human Resources</option>
                                <option value="technology">Technology</option>
                                <option value="legal">Legal</option>
                                <option value="real-estate">Real Estate</option>
                            </select><br><br>

                            <label for="attachment">Attachment</label><br>
                            <input type="file" id="attachment" name="attachment"><br><br>

                            <button type="submit" name="subbtn" class="submit-btn" onclick="myFunction()">Submit</button>
                        </fieldset>    
                    </form>
                </div> 
            </div>
        </div>
        <div class="midline"></div>
        <div class="sidebar">
            <div class="ad-space">
                <div class="ad-box1"></div>
                <div class="ad-box2"></div>
            </div>
        </div>
    </div>
    <footer>
        <div id="content"></div>
    </footer>
</body>
</html>
