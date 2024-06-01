<?PHP
if (isset($_POST['Delete'])) {
    $id = $_POST['IDselector'];
    $tables = array("cart", "customer");
    foreach ($tables as $x) {
        $sql = "DELETE FROM $x WHERE customerID =  $id";

        if ($conn->query($sql) === TRUE) {
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
}


if (isset($_POST['Edit'])) {

    $O = $_POST['IDselector'];
    $ty = $Customers[$O];

    $prodName = $_POST['CustFName'];
    if (empty($prodName)) {
        $prodName = $ty->getCustomerFName();
    }

    $prodPrice = $_POST['CustLName'];
    if (empty($prodPrice)) {
        $prodPrice = $ty->getCustomerLName();
    }

    $prodMeasurment = $_POST['CustEmail'];
    if (empty($prodMeasurment)) {
        $prodMeasurment = $ty->getCustomerEmail();
    }

    $prodAmount = password_hash($_POST['CustPass'], PASSWORD_DEFAULT);
    if (empty($prodAmount)) {
        $prodAmount = $ty->getCustomerPassword();
    }
    $sql = "UPDATE `customer` SET `Firstname`='$prodName',`Lastname`='$prodPrice',`email`='$prodMeasurment',`userpassword`='$prodAmount' WHERE customerID = $O";
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}
