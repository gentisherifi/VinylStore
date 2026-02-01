<?php
include "auth.php";

if ($_SESSION['role'] !== 'admin') {
    die("Access denied");
}

include "Database.php";
$db = new Database();
$conn = $db->getConnection();

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $conn->prepare(
        "INSERT INTO news (title, content, image_url, created_by) VALUES (?, ?, ?, ?)"
    );
    
    $result = $stmt->execute([
        htmlspecialchars($_POST['title']),
        htmlspecialchars($_POST['content']),
        htmlspecialchars($_POST['image_url']),
        $_SESSION['user_id']
    ]);
    
    if ($result) {
        $message = "News article added successfully!";
    } else {
        $message = "Error adding news article.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="index.css" />
    <title>Add News - Admin</title>
</head>
<body>
    <header>
        <nav>
            <h2><a href="index.php" class="logo">VinylStore</a></h2>
            <div>
                <a href="dashboard.php">Dashboard</a>
                <a href="add_news.php">Add News</a>
                <a href="view_contacts.php">Contacts</a>
                <a href="logout.php">Logout</a>
            </div>
        </nav>
    </header>

    <div class="container">
        <h1>Add Article</h1>

        <?php if ($message): ?>
            <div class="section" style="background: <?= strpos($message, 'success') !== false ? '#2a5a2a' : '#5a2a2a' ?>;">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>

        <div class="form-box" style="max-width: 600px;">
            <form method="POST">
                <label for="title">Title</label>
                <input id="title" name="title" type="text" required />

                <label for="content">Content</label>
                <textarea id="content" name="content" rows="8" 
                          style="width: 100%; padding: 10px; border-radius: 6px; 
                                 border: 1px solid #333; background: #111; color: white; 
                                 font-family: Arial; resize: vertical;" 
                          required></textarea>

                <label for="image_url">Image URL (optional)</label>
                <input id="image_url" name="image_url" type="url" 
                       placeholder="image link address here" />

                <button class="btn btn-full" type="submit">Publish Article</button>
            </form>

            <a href="dashboard.php" class="btn btn-outline btn-full">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>