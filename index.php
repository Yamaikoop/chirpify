<?php
session_start();
require 'database.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO tweets (user_id, content) VALUES (:user_id, :content)");
    $stmt->execute(['user_id' => $user_id, 'content' => $content]);
}

$stmt = $pdo->query("SELECT tweets.*, users.username FROM tweets JOIN users ON tweets.user_id = users.id ORDER BY tweets.created_at DESC");
$tweets = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Welkom, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <form method="POST">
            <textarea name="content" placeholder="Wat gebeurt er?" required></textarea>
            <button type="submit">Tweet</button>
        </form>

        <h2>Tweets</h2>
        <?php foreach ($tweets as $tweet): ?>
            <div class="tweet">
                <strong><?php echo htmlspecialchars($tweet['username']); ?></strong>
                <p><?php echo htmlspecialchars($tweet['content']); ?></p>
                <small><?php echo $tweet['created_at']; ?></small>
            </div>
        <?php endforeach; ?>

        <a href="logout.php">Uitloggen</a>
    </div>
</body>
</html>