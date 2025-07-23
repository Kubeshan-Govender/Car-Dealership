<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
  header('Location: login.php');
  exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Admin - Kia Used Cars</title></head>
<body>
  <h1>Admin Panel</h1>
  <form action="upload.php" method="POST" enctype="multipart/form-data">
    <p>Model: <input type="text" name="model" required></p>
    <p>Year: <input type="number" name="year" required></p>
    <p>Price: <input type="number" name="price" required></p>
    <p>Image: <input type="file" name="image" required></p>
    <button type="submit">Add Car</button>
  </form>
  <a href="logout.php">Logout</a>
</body>
</html>