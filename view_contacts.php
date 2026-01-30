<?php
include "auth.php";

if ($_SESSION['role'] !== 'admin') {
    die("Access denied");
}

include "Database.php";
$db = new Database();
$conn = $db->getConnection();

$contacts = $conn->query(
    "SELECT * FROM contact_messages ORDER BY created_at DESC"
)->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="index.css" />
    <title>Contact Messages - Admin</title>
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
        <h1>Contact Messages</h1>

        <?php if (count($contacts) > 0): ?>
            <?php foreach ($contacts as $contact): ?>
                <div class="news-item">
                    <h3><?= htmlspecialchars($contact['name']) ?></h3>
                    <small style="color: #aaa;">
                        <?= htmlspecialchars($contact['email']) ?> • 
                        <?= date('F j, Y g:i A', strtotime($contact['created_at'])) ?>
                    </small>
                    <p style="margin-top: 10px; line-height: 1.6;">
                        <?= nl2br(htmlspecialchars($contact['message'])) ?>
                    </p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="section">
                <p>No contact messages yet.</p>
            </div>
        <?php endif; ?>

        <a href="dashboard.php" class="btn" style="margin-top: 20px; display: inline-block;">
            Back to Dashboard
        </a>
    </div>
</body>
</html>