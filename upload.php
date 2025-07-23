<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
  die("Access denied");
}
$mysqli = new mysqli("localhost", "root", "", "kia_used_cars");

$model = $_POST['model'];
$year = $_POST['year'];
$price = $_POST['price'];
$image = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

move_uploaded_file($tmp, "uploads/" . $image);

$sql = "INSERT INTO cars (model, year, price, image) VALUES (?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sids", $model, $year, $price, $image);
$stmt->execute();
$stmt->close();
$mysqli->close();

header("Location: admin.php");
exit();
?>