<?php
require_once('user.php');
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $verify_password = $_POST['verify_password'];

    if (strlen($password) < 8) {
        $error_message = "Password should be at least 8 characters long.";
    } elseif ($password !== $verify_password) {
        $error_message = "Passwords do not match. Please try again.";
    } else {
        $user = new User();
        if ($user->username_exists($username)) {
            $error_message = "Username already exists!";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            if ($user->create_user($username, $hashed_password)) {
                echo "Account created successfully!";
                header('Location: /login.php');
                exit;
            } else {
                $error_message = "Failed to create account.";
            }
        }
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
    <?php
    if (!empty($error_message)) {
        echo "<p style='color:red;'>$error_message</p>";
    }
    ?>
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
