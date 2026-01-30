<?php
include "Database.php";
$db = new Database();
$conn = $db->getConnection();

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $conn->prepare(
        "INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)"
    );
    $stmt->execute([
        htmlspecialchars($_POST['name']),
        htmlspecialchars($_POST['email']),
        htmlspecialchars($_POST['message'])
    ]);
    $message = "Message sent successfully!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="index.css" />
    <title>Vinyl Store - Contact</title>
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
        <h1>Contact Us</h1>
        
        <?php if ($message): ?>
            <div class="section" style="background: #2a5a2a; color: #90ee90;">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>

        <div class="form-box">
            <form method="POST">
                <label for="name">Name</label>
                <input id="name" name="name" type="text" required />

                <label for="email">Email</label>
                <input id="email" name="email" type="email" required />

                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5" 
                          style="width: 100%; padding: 10px; border-radius: 6px; 
                                 border: 1px solid #333; background: #111; color: white;" 
                          required></textarea>

                <button class="btn btn-full" type="submit">Send Message</button>
            </form>
        </div>
    </div>
</body>
</html>