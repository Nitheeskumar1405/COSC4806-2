<?php
session_start();
require_once('user.php');

$username = $_POST['username'];
$password = $_POST['password'];

$user = new User();
$user_data = $user->get_user_by_username($username);

if ($user_data && password_verify($password, $user_data['password'])) {
    $_SESSION['username'] = $username;
    $_SESSION['authenticated'] = true;
    header('Location: /index.php');
    exit;
} else {
    if (!isset($_SESSION['failed_attempts'])) {
        $_SESSION['failed_attempts'] = 1;
    } else {
        $_SESSION['failed_attempts'] += 1;
    }
    header('Location: /login.php');
    exit;
}

