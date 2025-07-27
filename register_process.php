<?php
session_start();
require 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Validate input
    if (!$email || !$password) {
        $_SESSION['register_error'] = "Email and password are required.";
        header("Location: register.php");
        exit;
    }

    // Check if email already exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->fetch()) {
        $_SESSION['register_error'] = "This email is already registered.";
        header("Location: register.php");
        exit;
    }

    // Hash password & insert new user
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");

    try {
        $stmt->execute([$email, $hashed]);
        // Auto-login
        $_SESSION['user_id'] = $pdo->lastInsertId();
        $_SESSION['user_email'] = $email;
        header("Location: dashboard.php");
        exit;
    } catch (PDOException $e) {
        $_SESSION['register_error'] = "Something went wrong. Please try again.";
        header("Location: register.php");
        exit;
    }
}
?>
