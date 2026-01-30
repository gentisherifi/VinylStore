<?php
include "Database.php";
include "User.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $db = new Database();
    $conn = $db->getConnection();
    $user = new User($conn);
    
    if ($user->login($_POST['email'], $_POST['password'])) {
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid credentials";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="index.css" />
    <title>Vinyl Store - Login</title>
</head>
<body class="login-page">
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
        <h1 style="text-align: center; margin-bottom: 20px;">Login</h1>
        
        <div class="form-box">
            <?php if ($error): ?>
                <p style="color: #ff6b6b; text-align: center; margin-bottom: 15px;">
                    <?= htmlspecialchars($error) ?>
                </p>
            <?php endif; ?>

            <div class="social">
                <a class="social-btn google" href="#" aria-label="Continue with Google">
                    Continue with Google
                </a>
                <a class="social-btn apple" href="#" aria-label="Continue with Apple">
                    Continue with Apple
                </a>
            </div>

            <div class="divider">
                <span>or</span>
            </div>

            <form method="POST">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" required />

                <label for="password">Password</label>
                <input id="password" name="password" type="password" required />

                <div class="row">
                    <label class="checkbox">
                        <input type="checkbox" />
                        Remember me
                    </label>
                    <a class="link" href="#">Forgot password?</a>
                </div>

                <button class="btn btn-full" type="submit">Login</button>

                <p class="helper-text">
                    Don't have an account? <a href="register.php">Register</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>