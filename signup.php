<?php
require_once('user.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $verify_password = $_POST['verify_password'];

    if ($password === $verify_password && strlen($password) >= 10) {
        $user = new User();
        if ($user->username_exists($username)) {
            echo "Username already exists!";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            if ($user->create_user($username, $hashed_password)) {
                echo "Account created successfully!";
                header('Location: /login.php');
                exit;
            } else {
                echo "Failed to create account.";
            }
        }
    } else {
        echo "Passwords do not match or are not long enough!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
</head>
<body>
    <h1>Signup Form</h1>
    <form action="/signup.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="verify_password">Verify Password:</label><br>
        <input type="password" id="verify_password" name="verify_password" required><br><br>
        <input type="submit" value="Create Account">
    </form>
</body>
</html>
