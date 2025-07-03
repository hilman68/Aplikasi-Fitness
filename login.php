<?php
session_start();
include 'db.php';

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password_input = $_POST['password'];
    $role = $_POST['role'];

    if ($role == "admin") {
        $admin_query = mysqli_query($conn, "SELECT * FROM user_admin WHERE username = '$username'");
        if (mysqli_num_rows($admin_query) == 1) {
            $admin = mysqli_fetch_assoc($admin_query);
            if (password_verify($password_input, $admin['password'])) {
                $_SESSION['id_admin'] = $admin['id_admin'];
                $_SESSION['role'] = 'admin';
                header("Location: index.php");
                exit();
            }
        }
    } elseif ($role == "member") {
        $member_query = mysqli_query($conn, "SELECT * FROM member WHERE username = '$username'");
        if (mysqli_num_rows($member_query) == 1) {
            $member = mysqli_fetch_assoc($member_query);
            if (password_verify($password_input, $member['password'])) {
                $_SESSION['id_member'] = $member['id_member'];
                $_SESSION['role'] = 'member';
                header("Location: dashboard_member.php");
                exit();
            }
        }
    }

    $error = "Login gagal. Periksa kembali username, password, dan peran.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Aplikasi Fitness</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      background: url('images/background.jpg') no-repeat center center fixed;
      background-size: cover;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .overlay {
      background: rgba(0, 0, 0, 0.6);
      padding: 40px;
      border-radius: 10px;
      width: 320px;
      color: #fff;
      backdrop-filter: blur(4px);
    }

    .overlay h2 {
      text-align: center;
      margin-bottom: 20px;
      font-weight: bold;
      font-size: 24px;
      border-bottom: 2px solid #9b59b6;
      padding-bottom: 10px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 6px;
      font-size: 14px;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 10px;
      border: none;
      outline: none;
      border-radius: 5px;
      background: #eee;
    }

    .btn-login {
      width: 100%;
      padding: 10px;
      border: none;
      background: #9b59b6;
      color: white;
      font-weight: bold;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .btn-login:hover {
      background: #8e44ad;
    }

    .register {
      text-align: center;
      margin-top: 15px;
    }

    .register a {
      color: #9b59b6;
      text-decoration: none;
    }

    .alert {
      background-color: #e74c3c;
      color: white;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 5px;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="overlay">
    <h2>LOGIN</h2>
    <?php if ($error): ?>
      <div class="alert"><?= $error ?></div>
    <?php endif; ?>
    <form method="POST" action="">
      <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" required>
      </div>
      <div class="form-group">
        <label>Login Sebagai</label>
        <select name="role" required>
          <option value="">-- Pilih Peran --</option>
          <option value="admin">Admin</option>
          <option value="member">Member</option>
        </select>
      </div>
      <button type="submit" class="btn-login">Log in</button>
    </form>
    <div class="register">
      Belum punya akun? <a href="#">Register di sini</a>
    </div>
  </div>
</body>
</html>
