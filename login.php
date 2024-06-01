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
    <?php
    if (isset($_SESSION['success_message'])) {
        echo "<p style='color:green;'>" . $_SESSION['success_message'] . "</p>";
        unset($_SESSION['success_message']); }

    if (isset($_SESSION['failed_attempts'])) {
        echo "<p>This is unsuccessful attempt number: " . $_SESSION['failed_attempts'] . "</p>";
    }
    ?>
    <form action="/validate.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Submit">
    </form>
    <p><a href="/signup.php">Create an account</a></p>
</body>
</html>
