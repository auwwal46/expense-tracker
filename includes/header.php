<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Expense Tracker</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
  <a class="navbar-brand" href="#">Expense Tracker</a>
  
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <?php if (isset($_SESSION['user_id'])): ?>
      <a href="dashboard.php" class="btn btn-outline-light me-2">Dashboard</a>
      <a href="log_out.php" class="btn btn-outline-warning">Logout</a>
    <?php else: ?>
      <a href="index.php" class="btn btn-outline-light me-2">Login</a>
      <a href="register.php" class="btn btn-outline-success">Register</a>
    <?php endif; ?>
  </div>
</nav>

