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
    <h1>Assignment 1</h1>
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
