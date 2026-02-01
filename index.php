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
        <
        <h2 style="margin-bottom: 20px;">Featured Albums</h2>
        <div class="slider-container">
            <div class="slider" id="slider">
               
                <div class="slide">
                    <img src="https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?auto=format&fit=crop&w=1600&q=80" 
                         alt="Classic Rock Vinyl">
                    <div class="slide-content">
                        <h3>Classic Rock Collection</h3>
                        <p>Explore timeless rock albums from the golden era. High-quality pressings with original artwork.</p>
                    </div>
                </div>

               
                <div class="slide">
                    <img src="https://images.unsplash.com/photo-1519677100203-a0e668c92439?auto=format&fit=crop&w=1600&q=80" 
                         alt="Jazz Vinyl">
                    <div class="slide-content">
                        <h3>Premium Jazz Vinyl</h3>
                        <p>Discover the smooth sounds of jazz on authentic vinyl records. Perfect for collectors.</p>
                    </div>
                </div>

               
                <div class="slide">
                    <img src="https://images.unsplash.com/photo-1483412033650-1015ddeb83d1?auto=format&fit=crop&w=1600&q=80" 
                         alt="Turntable Setup">
                    <div class="slide-content">
                        <h3>Vintage Audio Experience</h3>
                        <p>Experience music the way it was meant to be heard. Analog warmth meets modern quality.</p>
                    </div>
                </div>

               
                <div class="slide">
                    <img src="https://images.unsplash.com/photo-1516981442399-a91139e20ff8?auto=format&fit=crop&w=1600&q=80" 
                         alt="Record Store">
                    <div class="slide-content">
                        <h3>Limited Edition Releases</h3>
                        <p>Don't miss our exclusive limited edition vinyl pressings. Available while supplies last.</p>
                    </div>
                </div>
            </div>

           
            <button class="slider-btn prev" onclick="moveSlide(-1)">❮</button>
            <button class="slider-btn next" onclick="moveSlide(1)">❯</button>

       
            <div class="slider-dots" id="dots"></div>
        </div>

        
        <h2 style="margin-top: 60px;">Featured Collections</h2>
        <div class="grid">
            <a href="shop.php" class="card-link">
                <div class="card">
                    <img src="https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?auto=format&fit=crop&w=300&q=60" 
                         alt="Rock Collection" />
                    <h3>Rock Collection</h3>
                </div>
            </a>
            <a href="shop.php" class="card-link">
                <div class="card">
                    <img src="https://images.unsplash.com/photo-1519677100203-a0e668c92439?auto=format&fit=crop&w=300&q=60" 
                         alt="Jazz Collection" />
                    <h3>Jazz Collection</h3>
                </div>
            </a>
        </div>

        
        <h2 style="margin-top: 40px;">Latest News</h2>
        <?php if (count($news) > 0): ?>
            <?php foreach ($news as $n): ?>
                <div class="news-item">
                    <h3><?= htmlspecialchars($n['title']) ?></h3>
                    <p><?= htmlspecialchars(substr($n['content'], 0, 120)) ?>...</p>
                    <small style="color: #aaa;">
                        <?= date('F j, Y', strtotime($n['created_at'])) ?>
                    </small>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="section">
                <p>No news articles available.</p>
            </div>
        <?php endif; ?>
        
        <a href="news.php" class="btn" style="margin-top: 20px;">View All News</a>
    </div>

    <script>
       
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');
        const totalSlides = slides.length;
        const dotsContainer = document.getElementById('dots');

       
        for (let i = 0; i < totalSlides; i++) {
            const dot = document.createElement('span');
            dot.className = 'dot';
            dot.onclick = () => goToSlide(i);
            dotsContainer.appendChild(dot);
        }

        const dots = document.querySelectorAll('.dot');

        function updateSlider() {
            const slider = document.getElementById('slider');
            slider.style.transform = `translateX(-${currentSlide * 100}%)`;
            
           
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentSlide);
            });
        }

        function moveSlide(direction) {
            currentSlide += direction;
            
            if (currentSlide < 0) {
                currentSlide = totalSlides - 1;
            } else if (currentSlide >= totalSlides) {
                currentSlide = 0;
            }
            
            updateSlider();
        }

        function goToSlide(index) {
            currentSlide = index;
            updateSlider();
        }

        
        setInterval(() => {
            moveSlide(1);
        }, 5000); 

  
        updateSlider();
    </script>
</body>
</html>