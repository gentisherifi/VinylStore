<?php
include "Database.php";
include "User.php";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST['password'] !== $_POST['confirm_password']) {
        $error = "Passwords do not match";
    } else {
        $db = new Database();
        $conn = $db->getConnection();
        $user = new User($conn);
        
        if ($user->register(
            $_POST['name'],
            $_POST['surname'],
            $_POST['email'],
            $_POST['password']
        )) {
            $success = "Registration successful! You can now login.";
        } else {
            $error = "Registration failed. Email may already be in use.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="index.css" />
    <title>Vinyl Store - Register</title>
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
        <h1 style="text-align: center; margin-bottom: 20px;">Register</h1>
        
        <div class="form-box">
            <?php if ($error): ?>
                <p style="color: #ff6b6b; text-align: center; margin-bottom: 15px;">
                    <?= htmlspecialchars($error) ?>
                </p>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <p style="color: #90ee90; text-align: center; margin-bottom: 15px;">
                    <?= htmlspecialchars($success) ?>
                </p>
            <?php endif; ?>

            <form method="POST">
                <label for="name">First Name</label>
                <input id="name" name="name" type="text" required />

                <label for="surname">Last Name</label>
                <input id="surname" name="surname" type="text" required />

                <label for="email">Email</label>
                <input id="email" name="email" type="email" required />

                <label for="password">Password</label>
                <input id="password" name="password" type="password" required />

                <label for="confirm_password">Confirm Password</label>
                <input id="confirm_password" name="confirm_password" type="password" required />

                <button class="btn btn-full" type="submit">Register</button>

                <p class="helper-text">
                    Already have an account? <a href="login.php">Login</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>