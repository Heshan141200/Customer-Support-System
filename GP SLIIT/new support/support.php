<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Page</title>
    <link rel="stylesheet" href="support.css">
    <link rel="stylesheet" href="navbar.css">
    <script src="navbar.js" defer></script>
    <link rel="stylesheet" href="footer.css">
    <script src="footer.js" defer></script>
    
    <script src="script.js" defer></script>
    
 </head>

<body>
    
    <header>
        <div id="logo"><img src="\GP SLIIT\Admin\download.jpeg" alt="Logo"width='50'length='25'></div>
        <div id="navbar-placeholder"></div>
    </header>

    <h1>How can we help you today?</h1>

    <div class="container">
        <div class="row">
            <button class="button" onclick="myFunction()">Documentation</button>
            <button class="button" onclick="location.href='/GP%20SLIIT/HTML/feedback.php'">Feedback</button>
        </div>

        <h2>Learn</h2>   

        <div class="row">
            <button class="button" onclick="myFunction_2()">New User</button>
            <button class="button" onclick="myFunction_3()">Project Admin</button>
        </div>

        <h2>Get Support</h2>    

        <div class="row">
            <button class="button" onclick="myFunction_4()">Choose our partner</button>
            <button class="button" onclick="location.href='/GP%20SLIIT/HTML/ticketpage.php'">Raise a ticket</button>
        </div>
    </div>


    <footer>
        <div id="content"></div>
    </footer>
    
    
</body>
</html>
