<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knowledge Center</title>
    <link href="\GP SLIIT\KC\styles.css" rel="stylesheet">
    <link rel="stylesheet" href="navbar.css">
    <script src ="navbar.js"></script>
    <link rel="stylesheet" href="footer.css">
    <script src ="footer.js"></script>
    <script src ="\GP SLIIT\KC\script.js"></script>
    <link rel="stylesheet" href="\GP SLIIT\KC\sbar.css">

    
</head>
<body>
<header>
    <div id="logo"><img src="\GP SLIIT\Admin\download.jpeg"width='50'length='25'></div>
    <div id="navbar-placeholder"></div>
</header>

<div class="search-container">
    <input type="text" id="searchBar" placeholder="Search for articles..." onkeyup="searchArticles()">
</div>



    <div class="main-content" id="main-content">
        <div class="article">
            <img src="\GP SLIIT\KC\e com.png" alt="Article 1">
            <div class="article-content">
                <h2 class="article-title">Best Customer Service Outsourcing Companies for E-Commerce — Top 5 Companies in 2024</h2>
                <p class="article-text">We present an in-depth review of 5 best customer service outsourcing companies for this year. </p>
                <a href ="\GP SLIIT\KC\article1.php">learn more</a>
            </div>
        </div>

        <div class="article">
            <img src="\GP SLIIT\KC\web d.png" alt="Article 2">
            <div class="article-content">
                <h2 class="article-title">Top 5 Web Development Frameworks for 2024</h2>
                <p class="article-text">In 2024, web development is growing faster than ever, and choosing the right framework can make or break your project.</p>
                <a href = "\GP SLIIT\KC\article2.php">learn more</a>
            </div>
        </div>

        <div class="article">
            <img src="\GP SLIIT\KC\ai.png" alt="Article 3">
            <div class="article-content">
                <h2 class="article-title">Top 5 AI Trends to Watch in 2024</h2>
                <p class="article-text">Artificial Intelligence (AI) continues to evolve rapidly, with new advancements shaping industries worldwide. In this article, we’ll dive into the top 5 AI trends to watch in 2024</p>
                <a href = " \GP SLIIT\KC\article3.php">learn more</a>
            </div>
        </div>

        <div class="article">
            <img src="\GP SLIIT\KC\tec i.png" alt="Article 4">
            <div class="article-content">
                <h2 class="article-title">Technology & Innovation</h2>
                <p class="article-text">The Future of Artificial Intelligence: How AI is Shaping the World.Understanding Quantum Computing: The Next Revolution in Technology.5G Networks: How Faster Connectivity Impacts Businesses and Consumers.</p>
                <a href = '../PHP2/article4.php'>learn more</a>
            </div>
        </div>

        <div class="article">
            <img src="\GP SLIIT\KC\lead.png" alt="Article 5">
            <div class="article-content">
                <h2 class="article-title">Business & Leadership</h2>
                <p class="article-text">The Importance of Emotional Intelligence in Leadership.How to Foster Innovation in Your Organization.Remote Work Best Practices: Keeping Your Team Connected and Engaged.</p>
                <a href = '../PHP2/article5.php'>learn more</a>
            </div>
        </div>

        <div class="article">
            <img src="\GP SLIIT\KC\pro.png" width="10px" alt="Article 6">
            <div class="article-content">
                <h2 class="article-title">Personal Development & Productivity</h2>
                <p class="article-text">Effective Time Management Strategies for Busy Professionals.The Science of Habits: How to Build Positive Routines.Mindfulness and Mental Health: Tools to Enhance Well-being.</p>
                <a href = '../PHP2/article6.php'>learn more</a>
            </div>
        </div>
    </div>

    <div class="browse-more">
        <button onclick="loadMoreArticles()">Browse more articles</button>
    </div>

    <div class="marquee">
        Stay updated with our latest support articles and tips!
    </div>

    <footer>
        <div id="content"></div>
    </footer>
    
    <script>
function searchArticles() {
    const searchInput = document.getElementById('searchBar').value.toLowerCase();
    const articles = document.getElementsByClassName('article');

    for (let i = 0; i < articles.length; i++) {
        const articleTitle = articles[i].getElementsByClassName('article-title')[0].innerText.toLowerCase();
        const articleText = articles[i].getElementsByClassName('article-text')[0].innerText.toLowerCase();

        if (articleTitle.includes(searchInput) || articleText.includes(searchInput)) {
            articles[i].style.display = '';
        } else {
            articles[i].style.display = 'none';
        }
    }
}
</script>


    

</body>
</html>


