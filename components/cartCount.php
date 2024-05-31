<?php
if(isset($_SESSION['user_id'])){
    include('DBconnect.php');
    $user =$_SESSION['user_id'];
    $sql = "SELECT * FROM cart where customerID = $user";
    $result = $conn->query($sql);
    $a = 0;

    while($row = $result->fetch_assoc()) {
        $a = $a+$row["Quantity"];
    }
    if($a==0){
        echo 0;
    }
    elseif($a>10){
        echo '10+';
    }
    else{
        echo $a;
    }
} 
?>
