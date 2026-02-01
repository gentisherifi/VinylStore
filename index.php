<?php
include "Database.php";
$db = new Database();
$conn = $db->getConnection();

$news = $conn->query(
    "SELECT * FROM news WHERE title IS NOT NULL ORDER BY created_at DESC LIMIT 3"
)->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="index.css" />
    <title>Vinyl Store - Home</title>
</head>
<body>
    <header>
        <nav>
            <h2><a href="index.php" class="logo">VinylStore</a></h2>
            <div>
                <a href="index.php">Home</a>
                <a href="shop.php">Shop</a>
                <a href="about.php">About</a>
                <a href="news.php">News</a>
                <a href="login.php">Login</a>
            </div>
        </nav>
    </header>

    <section class="hero">
        <h1>Discover the World of Vinyl</h1>
        <p style="margin-top: 15px; font-size: 18px;">
            Curated collections for true music lovers
        </p>
        <a href="shop.php" class="btn" style="margin-top: 20px;">Browse Collection</a>
    </section>

    <div class="container">
        <h2>Featured Collections</h2>
        <div class="grid">
            <a href="shop.php" class="card-link">
                <div class="card">
                    <img src="images/rockclasic.jpg" alt="Rock Collection" />
                    <h3>Rock Collection</h3>
                </div>
            </a>
            <a href="shop.php" class="card-link">
                <div class="card">
                    <img src="images/jazzvinyl.png" alt="Jazz Collection" />
                    <h3>Jazz Collection</h3>
                </div>
            </a>
        </div>

        <h2 style="margin-top: 40px;">Latest News</h2>
        <?php foreach ($news as $n): ?>
            <div class="news-item">
                <h3><?= htmlspecialchars($n['title']) ?></h3>
                <p><?= htmlspecialchars(substr($n['content'], 0, 120)) ?>...</p>
                <small style="color: #aaa;">
                    <?= date('F j, Y', strtotime($n['created_at'])) ?>
                </small>
            </div>
        <?php endforeach; ?>
        
        <a href="news.php" class="btn" style="margin-top: 20px;">View All News</a>
    </div>
</body>
</html>