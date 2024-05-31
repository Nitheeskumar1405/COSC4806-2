<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login Form</h1>
    <form action="/validate.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Submit">
    </form>
    <p><a href="/signup.php">Create an account</a></p>
    <?php
    if (isset($_SESSION['failed_attempts'])) {
        echo "<p>This is unsuccessful attempt number: " . $_SESSION['failed_attempts'] . "</p>";
    }
    ?>
</body>
</html>
