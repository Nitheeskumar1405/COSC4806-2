<?php
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: /login.php');
    exit;
}
?>

    
<!DOCTYPE html>
<html>
<head>
    <title>Nash</title>
</head>
<body>
    <h1>Assignment 2</h1>
    <p>Welcome, <?= htmlspecialchars($_SESSION['username']) ?></p>
    <?php
    if (isset($_SESSION['message'])) {
        echo "<p>" . htmlspecialchars($_SESSION['message']) . "</p>";
        unset($_SESSION['message']);
    }
    ?>
    <footer>
        <p>
            <a href="/logout.php">Click here to logout</a>
        </p>
    </footer>
</body>
</html>
//i have noticed that webview is not looding the page so i have run it on visual studio code with php extension and loaded it on my local host. I have uploaded the screenshots of me testing the functions with my replit and github links. Thanks:)