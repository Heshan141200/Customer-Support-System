<?php include('./udbcon.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supportify</title>
    <link rel="stylesheet" type="text/css" href="../CSS/home.css">
    <link rel="stylesheet" type="text/css" href="../CSS/navbar.css">
    <script src="../JS/navbar.js" defer></script>
    <link rel="stylesheet" type="text/css" href="../CSS/footer.css">
    <script src="../JS/footer.js" defer></script>
</head>
<body>
    <header>
        <div id="logo"><img src="\GP SLIIT\CSA\download.jpeg"width=50px length=25px></div>
        <div id="navbar-placeholder"></div>
    </header>
    <h1>Welcome to our Online Customer Support Service</h1>
    <h3>Get the best customer experince with our innovative<br>solutions</h3>
    <button type="button" id="getS" onclick="location.href='/GP%20SLIIT/HTML/ticketpage.php'">Get Started</button>
    <button type="button" id="getS" onclick="location.href='/GP%20SLIIT/Premium/subscription.php'">Be a Premium</button>
    <hr>
    <div class="container">
        <div class="card">
            <h3>24/7 Availability</h3>
            <img src="../Images/24x7.com.png">
            <p>Customers have access to online support 24/7, irrespective of their location or time zone.</p>
            <!-- <button onclick="location.href=''">Learn More</button> -->
        </div>
        <div class="card">
            <h3>Cost Savings</h3>
            <img src="../Images/costsa.com.png">
            <p>Online support eliminates the need for phone calls or in-person visits, saving both time and money for users.</p>
            <!-- <button onclick="location.href=''">Learn More</button> -->
        </div>
        <div class="card">
            <h3>Convenience</h3>
            <img src="../Images/conv.com.png">
            <p>Customers can seek help from the comfort of their home or workplace without needing to visit a physical location or make phone calls.</p>
            <!-- <button onclick="location.href=''">Learn More</button> -->
        </div>
    </div>
    <h2>What Our Customers say</h2>
    <div class="container">
        <div class="card">
            <p>"Fantastic 24/7 Support!"<br><br>
                I was pleasantly surprised by the 24/7 availability of the support team. I had an issue late at night, and the live chat was super helpful in resolving it quickly. No waiting around, just quick and efficient service. Highly recommend!<br><br>
                — Emily J.</p>
            <!-- <button onclick="location.href=''">Read More</button> -->
        </div>
        <div class="card">
            <p>"Convenient and Fast Responses"<br><br>
                I love how easy it is to get help through WeSup. The live chat and email support are very responsive. I had an issue with my account, and it was resolved within an hour. The only reason I’m giving four stars is that the self-service knowledge base could be more detailed.<br><br>
                — Michael R.</p>
            <!-- <button onclick="location.href=''">Read More</button> -->
        </div>
        <div class="card">
            <p>"Saved Me So Much Time!"<br><br>
                The appointment scheduling feature is a game-changer. I booked a session with a specialist who walked me through the entire process of setting up my account. I didn’t have to wait in a queue or go through multiple agents. Amazing service!<br><br>
                — Sarah P.</p>
            <!-- <button onclick="location.href=''">Read More</button> -->
        </div>
    </div>
    <footer>
        <div id="content"></div>
        <!-- <p>WeSupport &copy 2024</p> -->
    </footer>
</body>
</html>