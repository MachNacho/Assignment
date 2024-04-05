<?php
    include('DBconnect.php');
    $user =$_SESSION['user_id'];
    $sql = "SELECT * FROM cart where userID = $user";
    $result = $conn->query($sql);
    if(mysqli_num_rows($result)==0){
    }
    elseif(mysqli_num_rows($result)>10){
        echo '10+';
    }
    else{
        echo mysqli_num_rows($result);
    }
   
?>
