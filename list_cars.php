<?php
$mysqli = new mysqli("localhost", "root", "", "kia_used_cars");
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

$sql = "SELECT * FROM cars WHERE sold = 0 ORDER BY created_at DESC";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  while($car = $result->fetch_assoc()) {
    echo "<div class='car-item'>";
    echo "<img src='uploads/" . htmlspecialchars($car['image']) . "' alt='" . htmlspecialchars($car['model']) . "'>";
    echo "<h3>" . htmlspecialchars($car['model']) . "</h3>";
    echo "<p>Year: " . htmlspecialchars($car['year']) . "</p>";
    echo "<p>Price: R" . number_format($car['price']) . "</p>";
    echo "</div>";
  }
} else {
  echo "<p>No cars available at the moment.</p>";
}
$mysqli->close();
?>