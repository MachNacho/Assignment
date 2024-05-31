<?php
include('DBconnect.php');
$my_array = array("cart","customer","orders","products","orderitems");
foreach ($my_array as $x) {

    $sql = "SELECT Count(*) FROM $x";
    $result = $conn->query($sql);
    $row = mysqli_fetch_row($result);
    $table_count = $row[0];
    echo ("
    <div class = 'tableCountContainer'>
        <div class = 'TableInfoContainer'>
            <div class='TableNameWrapper'>
               Table name: $x
            </div>
            <div class='TableCountWrapper'>
                Row count: $table_count
            </div>
        </div>
    </div>
    ");
}

?>
