<?php
    include('DBconnect.php');
    $user =$_SESSION['user_id'];
    $sql = "SELECT * FROM cart where userID = $user";
    $result = $conn->query($sql);  
    echo mysqli_num_rows($result);
?>
