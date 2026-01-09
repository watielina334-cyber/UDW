<?php
session_start();
include "../config/database.php";

$error = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($koneksi,
        "SELECT * FROM admin 
         WHERE username='$username' AND password='$password'"
    );

    if (mysqli_num_rows($query) == 1) {
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah";
    }
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Login Admin</title>
  <link rel="stylesheet" href="../assets/css/admin-login.css">
</head>
<body>

<div class="login-wrapper">
  <div class="login-box">
    <h3>Login Admin</h3>

    <?php if ($error): ?>
      <div class="alert"><?= $error; ?></div>
    <?php endif; ?>

    <form method="post">
      <input type="text" name="username" placeholder="Username" required>

      <div class="password-box">
        <input type="password" name="password" id="password" placeholder="Password" required>
        <span class="eye" id="toggle">👁</span>
      </div>

      <button type="submit" name="login">Login</button>
    </form>
  </div>
</div>

<script>
  const toggle = document.getElementById('toggle');
  const pass = document.getElementById('password');

  toggle.onclick = function () {
    pass.type = pass.type === "password" ? "text" : "password";
  }
</script>

</body>
</html>
