<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  if ($username === 'praveen' && $password === 'kia123') {
    $_SESSION['logged_in'] = true;
    header('Location: admin.php');
    exit();
  } else {
    $error = "Invalid login";
  }
}
?>
<form method="POST">
  <p>Username: <input type="text" name="username"></p>
  <p>Password: <input type="password" name="password"></p>
  <button type="submit">Login</button>
  <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</form>