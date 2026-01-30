<?php
include "Database.php";
$db = new Database();
$conn = $db->getConnection();

$news = $conn->query(
    "SELECT * FROM news WHERE title IS NOT NULL ORDER BY created_at DESC"
)->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="index.css" />
    <title>Vinyl Store - News</title>
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

    <div class="container">
        <h1>Latest News</h1>

        <?php if (count($news) > 0): ?>
            <?php foreach ($news as $item): ?>
                <div class="news-item">
                    <?php if (!empty($item['image_url'])): ?>
                        <img src="<?= htmlspecialchars($item['image_url']) ?>" 
                             alt="<?= htmlspecialchars($item['title']) ?>" />
                    <?php endif; ?>
                    
                    <h3><?= htmlspecialchars($item['title']) ?></h3>
                    <small><?= date('F j, Y', strtotime($item['created_at'])) ?></small>
                    <p style="margin-top: 10px;">
                        <?= htmlspecialchars($item['content']) ?>
                    </p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="section">
                <p>No news articles available at the moment.</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>