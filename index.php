<?php
include "db.php";
$db = new Database();
$conn = $db->getConnection();

$news = $conn->query("SELECT * FROM news ORDER BY created_at DESC LIMIT 3")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="index.css">
<title>Vinyl Store - Home</title>
</head>
<body>
<header>
<nav>
<h2><a href="index.php" class="logo">VinylStore</a></h2>
<div>
<a href="index.php">Home</a>
<a href="about.php">About</a>
<a href="news.php">News</a>
<a href="login.php">Login</a>
</div>
</nav>
</header>

<section class="hero">
<h1>Discover the World of Vinyl</h1>
<a href="shop.php" class="btn">Shop Now</a>
</section>

<div class="container" id="arrivals">
<h2>Latest News</h2>

<div class="grid">
<?php foreach($news as $n): ?>
<div class="card">
<h3><?= $n['title'] ?></h3>
<p><?= substr($n['content'],0,100) ?>...</p>
</div>
<?php endforeach; ?>
</div>
</div>
</body>
</html>