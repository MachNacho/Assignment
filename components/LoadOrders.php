<?php
$UserID = $_SESSION['user_id'];
$sql = "SELECT * FROM `orders` WHERE customerID = $UserID";
$result = $conn->query($sql);
?>
