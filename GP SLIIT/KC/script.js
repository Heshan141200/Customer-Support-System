function loadMoreArticles() {
    const mainContent = document.getElementById('main-content');
    const articles = [
        {
            title: "Setting Up Notifications",
            text: "Customize your notifications to stay informed about important updates and changes.",
            img: "https://img.freepik.com/premium-photo/white-wall-with-white-background-that-says-word-it_994023-371201.jpg"
        },
        {
            title: "Managing Your Subscription",
            text: "Learn how to manage your subscription, including upgrading, downgrading, and canceling.",
            img: "https://img.freepik.com/premium-photo/white-wall-with-white-background-that-says-word-it_994023-371201.jpg"
        },
        {
            title: "Recovering a Locked Account",
            text: "Follow these steps to recover your account if you get locked out due to multiple failed login attempts.",
            img: "https://img.freepik.com/premium-photo/white-wall-with-white-background-that-says-word-it_994023-371201.jpg"
        }
    ];

    articles.forEach((article, index) => {
        const newArticle = document.createElement('div');
        newArticle.className = 'article';

        newArticle.innerHTML = `
            <img src="${article.img}" alt="Article ${index + 4}">
            <div class="article-content">
                <h2 class="article-title">${article.title}</h2>
                <p class="article-text">${article.text}</p>
            </div>
        `;
        mainContent.appendChild(newArticle);
    });
}

