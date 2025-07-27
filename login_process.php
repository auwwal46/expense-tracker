<?php
session_start();
require 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (!$email || !$password) {
        $_SESSION['login_error'] = "Email and password are required.";
        header("Location: index.php");
        exit;
    }

    // Check user
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Login success
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        header("Location: dashboard.php");
        exit;
    } else {
        // Invalid login
        $_SESSION['login_error'] = "Incorrect email or password.";
        header("Location: index.php");
        exit;
    }
}
?>
