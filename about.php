<?php
include "Database.php";

$db = new Database();
$conn = $db->getConnection();
?>

!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="index.css" />
  <title>Vinyl Store - About</title>
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

  <div class="container">
    <h1>About VinylStore</h1>

    <div class="section">
      <p>
      VinylStore is a modern vinyl record shop built for true music lovers. We focus on high-quality pressings, timeless albums, and carefully curated collections across a wide range of genres.
      </p>
      <p>
        Whether you’re discovering vinyl for the first time or expanding an existing collection, VinylStore is built to celebrate the beauty of analog sound.
      </p>
    </div>

    <h2 style="margin-top: 30px;">What We Stand For</h2>

    <div class="grid">
      <div class="card">
        <img
          src="https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4"
          alt="Vinyl records collection"
        />
        <h3>Curated Collections</h3>
      </div>

      <div class="card">
        <img
          src="https://images.unsplash.com/photo-1483412033650-1015ddeb83d1"
          alt="Vintage turntable"
        />
        <h3>Analog Experience</h3>
      </div>

      <div class="card">
        <img
          src="https://images.unsplash.com/photo-1516981442399-a91139e20ff8"
          alt="Vinyl record store"
        />
        <h3>Community & Culture</h3>
      </div>
    </div>

    <h2 style="margin-top: 40px;">Why Vinyl?</h2>

    <div class="section">
      <p>
        Vinyl is more than just music — it’s an experience. From the artwork you hold in your hands to the warmth of the sound, vinyl creates a connection that digital formats simply can’t replicate.
      </p>
      <p>
        At VinylStore, we believe music is meant to be felt, not simply listened to.
      </p>
    </div>
  </div>
</body>
</html>
