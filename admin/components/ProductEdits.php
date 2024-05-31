<?PHP
if (isset($_POST['Insert'])) {

    $file_name = $_FILES['myfile']['name'];
    $tempname = $_FILES['myfile']['tmp_name'];
    $folder = '../assets/productImages/' . trim($file_name);
    if (move_uploaded_file($tempname, $folder)) {
        echo 'yay';
    }

    $prodName = $_POST['ProdName'];
    $prodPrice = $_POST['ProdPrice'];
    $prodMeasurment = $_POST['ProdUOM'];
    $prodAmount = $_POST['ProdAMT'];
    $sql = "INSERT INTO products ( `Name`, `Price`, `Amount`, `UnitOfMeasurment`, `imageName`) VALUES ('$prodName','$prodPrice','$prodAmount','$prodMeasurment','$file_name')";
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}

if (isset($_POST['Delete'])) {
    $id = $_POST['IDselector'];
    $tables = array("cart", "products");
    foreach ($tables as $x) {
        $sql = "DELETE FROM $x WHERE pID =  $id";

        if ($conn->query($sql) === TRUE) {
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
}


if (isset($_POST['Edit'])) {

    $O = $_POST['IDselector'];
    $ty = $Prod[$O];

    $prodName = $_POST['ProdName'];
    if (empty($prodName)) {
        $prodName = $ty->getProdName();
    }

    $prodPrice = $_POST['ProdPrice'];
    if (empty($prodPrice)) {
        $prodPrice = $ty->getProdPrice();
    }

    $prodMeasurment = $_POST['ProdUOM'];
    if (empty($prodMeasurment)) {
        $prodMeasurment = $ty->getProdMeasurement();
    }

    $prodAmount = $_POST['ProdAMT'];
    if (empty($prodAmount)) {
        $prodAmount = $ty->getProdAmount();
    }
    $prodimages = $_FILES['myfile']['name'];
    if(!empty($prodimages)){
        $file_name = $_FILES['myfile']['name'];
        $prodimages = $_FILES['myfile']['name'];
        $tempname = $_FILES['myfile']['tmp_name'];
        $folder = '../assets/productImages/'.trim($file_name);
        if( move_uploaded_file($tempname, $folder)){
        }
    }
    else{
        $prodimages = $ty->getImage();
    }
    $sql = "UPDATE `products` SET `Name`='$prodName',`Price`='$prodPrice',`Amount`='$prodAmount',`UnitOfMeasurment`=' $prodMeasurment',`imageName`='$prodimages' WHERE pID = $O";
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}
