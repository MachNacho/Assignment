<?PHP
if (isset($_POST['Delete'])) {
    $id = $_POST['IDselector'];
    $tables = array("orderitems", "orders");
    foreach ($tables as $x) {
        $sql = "DELETE FROM $x WHERE OrderID = $id";

        if ($conn->query($sql) === TRUE) {
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
}


if (isset($_POST['Edit'])) {

    $O = $_POST['IDselector'];
    $s = $_POST['OrderStatselector'];
    $sql = "UPDATE `orders` SET  `OrderStatus`='$s' WHERE OrderID = $O";
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}
