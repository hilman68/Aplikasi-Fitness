<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Beranda - Aplikasi Fitness</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="home.php">Aplikasi Fitness</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="home.php">Home</a>
        </li>
        <?php if (!isset($_SESSION['role'])): ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link" href="#">Informasi</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
  <h2>Selamat Datang di Aplikasi Fitness</h2>
  <?php if (isset($_SESSION['role'])): ?>
    <?php if ($_SESSION['role'] == 'admin'): ?>
        <div class="alert alert-info">Login sebagai <b>Admin</b></div>
    <?php elseif ($_SESSION['role'] == 'member'): ?>
        <div class="alert alert-success">Login sebagai <b>Member</b></div>
    <?php endif; ?>
  <?php else: ?>
    <p>Silakan login untuk mengakses fitur lebih lanjut.</p>
  <?php endif; ?>
</div>
</body>
</html>
