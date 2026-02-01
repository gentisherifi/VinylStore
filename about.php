<?php
include "Database.php";
$db = new Database();
$conn = $db->getConnection();
?>
<!DOCTYPE html>
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
                <a href="shop.php">Shop</a>
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
                VinylStore is a modern vinyl record shop built for true music lovers. 
                We focus on high-quality pressings, timeless albums, and carefully curated 
                collections across a wide range of genres.
            </p>
            <p>
                Whether you're discovering vinyl for the first time or expanding an existing 
                collection, VinylStore is built to celebrate the beauty of analog sound.
            </p>
        </div>

        <h2 style="margin-top: 30px;">What We Stand For</h2>
        <div class="grid">
            <div class="card">
                <img src="https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?auto=format&fit=crop&w=300&q=60" 
                     alt="Vinyl records collection" />
                <h3>Curated Collections</h3>
            </div>
            <div class="card">
                <img src="https://images.unsplash.com/photo-1483412033650-1015ddeb83d1?auto=format&fit=crop&w=300&q=60" 
                     alt="Vintage turntable" />
                <h3>Analog Experience</h3>
            </div>
            <div class="card">
                <img src="https://images.unsplash.com/photo-1516981442399-a91139e20ff8?auto=format&fit=crop&w=300&q=60" 
                     alt="Vinyl record store" />
                <h3>Community & Culture</h3>
            </div>
        </div>

        <h2 style="margin-top: 50px;">What Our Customers Say</h2>
        <div class="slider-container" style="max-width: 800px;">
            <div class="slider" id="reviewSlider">
            
                <div class="slide">
                    <div style="background: #1c1c1c; padding: 40px; border-radius: 8px; min-height: 250px; display: flex; flex-direction: column; justify-content: center;">
                        <p style="font-size: 18px; line-height: 1.8; margin-bottom: 20px; font-style: italic;">
                            "VinylStore has the best collection of jazz records I've ever seen. The quality is outstanding and the staff really knows their music!"
                        </p>
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <div style="width: 50px; height: 50px; border-radius: 50%; background: #f5c26b; display: flex; align-items: center; justify-content: center; font-size: 24px; font-weight: bold; color: #111;">
                                M
                            </div>
                            <div>
                                <strong style="color: #f5c26b;">Michael Johnson</strong>
                                <p style="color: #aaa; font-size: 14px; margin-top: 4px;">Jazz Enthusiast</p>
                            </div>
                        </div>
                    </div>
                </div>

              
                <div class="slide">
                    <div style="background: #1c1c1c; padding: 40px; border-radius: 8px; min-height: 250px; display: flex; flex-direction: column; justify-content: center;">
                        <p style="font-size: 18px; line-height: 1.8; margin-bottom: 20px; font-style: italic;">
                            "I started my vinyl collection here and couldn't be happier. Every album is carefully selected and the sound quality is amazing!"
                        </p>
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <div style="width: 50px; height: 50px; border-radius: 50%; background: #f5c26b; display: flex; align-items: center; justify-content: center; font-size: 24px; font-weight: bold; color: #111;">
                                S
                            </div>
                            <div>
                                <strong style="color: #f5c26b;">Sarah Williams</strong>
                                <p style="color: #aaa; font-size: 14px; margin-top: 4px;">New Collector</p>
                            </div>
                        </div>
                    </div>
                </div>

             
                <div class="slide">
                    <div style="background: #1c1c1c; padding: 40px; border-radius: 8px; min-height: 250px; display: flex; flex-direction: column; justify-content: center;">
                        <p style="font-size: 18px; line-height: 1.8; margin-bottom: 20px; font-style: italic;">
                            "The limited edition pressings are incredible. VinylStore always has the rare finds I'm looking for. Highly recommend!"
                        </p>
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <div style="width: 50px; height: 50px; border-radius: 50%; background: #f5c26b; display: flex; align-items: center; justify-content: center; font-size: 24px; font-weight: bold; color: #111;">
                                D
                            </div>
                            <div>
                                <strong style="color: #f5c26b;">David Martinez</strong>
                                <p style="color: #aaa; font-size: 14px; margin-top: 4px;">Serious Collector</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <button class="slider-btn prev" onclick="moveReviewSlide(-1)">❮</button>
            <button class="slider-btn next" onclick="moveReviewSlide(1)">❯</button>

            
            <div class="slider-dots" id="reviewDots"></div>
        </div>

        <h2 style="margin-top: 40px;">Why Vinyl?</h2>
        <div class="section">
            <p>
                Vinyl is more than just music — it's an experience. From the artwork you 
                hold in your hands to the warmth of the sound, vinyl creates a connection 
                that digital formats simply can't replicate.
            </p>
            <p>
                At VinylStore, we believe music is meant to be felt, not simply listened to.
            </p>
        </div>
    </div>

    <script>
        
        let currentReview = 0;
        const reviewSlides = document.querySelectorAll('#reviewSlider .slide');
        const totalReviews = reviewSlides.length;
        const reviewDotsContainer = document.getElementById('reviewDots');

        
        for (let i = 0; i < totalReviews; i++) {
            const dot = document.createElement('span');
            dot.className = 'dot';
            dot.onclick = () => goToReview(i);
            reviewDotsContainer.appendChild(dot);
        }

        const reviewDots = document.querySelectorAll('#reviewDots .dot');

        function updateReviewSlider() {
            const slider = document.getElementById('reviewSlider');
            slider.style.transform = `translateX(-${currentReview * 100}%)`;
            
          
            reviewDots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentReview);
            });
        }

        function moveReviewSlide(direction) {
            currentReview += direction;
            
            if (currentReview < 0) {
                currentReview = totalReviews - 1;
            } else if (currentReview >= totalReviews) {
                currentReview = 0;
            }
            
            updateReviewSlider();
        }

        function goToReview(index) {
            currentReview = index;
            updateReviewSlider();
        }

      
        setInterval(() => {
            moveReviewSlide(1);
        }, 6000); 

       
        updateReviewSlider();
    </script>
</body>
</html>