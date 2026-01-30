<?php
include "auth.php";

$isAdmin = ($_SESSION['role'] === 'admin');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="index.css" />
    <title>VinylStore - Dashboard</title>
    <?php if (!$isAdmin): ?>
   
    <meta http-equiv="refresh" content="3;url=index.php">
    <?php endif; ?>
</head>
<body>
    <header>
        <nav>
            <h2><a href="index.php" class="logo">VinylStore</a></h2>
            <div>
                <a href="index.php">Home</a>
                <?php if ($isAdmin): ?>
                    <a href="dashboard.php">Dashboard</a>
                <?php endif; ?>
                <a href="logout.php">Logout</a>
            </div>
        </nav>
    </header>

    <div class="container">
        <?php if ($isAdmin): ?>
            
            <h1>Admin Dashboard</h1>
            
            <p style="margin: 15px 0; color: #aaa;">
                Welcome, <?= htmlspecialchars($_SESSION['name']) ?>!
            </p>

            <div class="grid">
                <a href="add_news.php" class="card-link">
                    <div class="card">
                        <h3>Add News</h3>
                        <p style="color: #aaa; margin-top: 8px;">Create new articles</p>
                    </div>
                </a>
                
                <a href="view_contacts.php" class="card-link">
                    <div class="card">
                        <h3>View Contacts</h3>
                        <p style="color: #aaa; margin-top: 8px;">See contact messages</p>
                    </div>
                </a>
            </div>
        <?php else: ?>
            
            <div style="text-align: center; margin-top: 80px;">
                <div style="display: inline-block; padding: 40px; background: #1c1c1c; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.3); max-width: 500px;">
                    <div style="font-size: 64px; margin-bottom: 20px;">✅</div>
                    <h1 style="color: #4CAF50; margin-bottom: 15px;">Login Successful!</h1>
                    <p style="color: #aaa; font-size: 18px; margin-bottom: 20px;">
                        Welcome back, <strong><?= htmlspecialchars($_SESSION['name']) ?></strong>!
                    </p>
                    <p style="color: #ddd; margin-bottom: 25px; line-height: 1.6;">
                        You have successfully logged into your VinylStore account.
                    </p>
                    <p style="color: #f5c26b; margin-bottom: 25px; font-size: 14px;">
                        Redirecting to homepage in <span id="countdown">3</span> seconds...
                    </p>
                    <a href="index.php" class="btn" style="font-size: 16px; padding: 12px 30px;">
                        Go to Home Page Now
                    </a>
                </div>
            </div>

            <script>
                
                let seconds = 3;
                const countdownEl = document.getElementById('countdown');
                
                setInterval(() => {
                    seconds--;
                    if (seconds > 0) {
                        countdownEl.textContent = seconds;
                    }
                }, 1000);
            </script>
        <?php endif; ?>
    </div>
</body>
</html>