<?php
$UserID;
$Products_tosell = array();
session_start();
// verifies if user is logged in
if (isset($_SESSION['user_email'])) {
    global $UserID;
    $UserID = $_SESSION['user_id'];
    $UserEmail = $_SESSION['user_email'];
    $UserName = $_SESSION['user_name'] . ' ' . $_SESSION['user_surname'];
} else {
    header("Location:  Userlogin.php");
};
include('components/DBconnect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="css/UserStyle.css?<?= filemtime("css/UserStyle.css") ?>" rel="stylesheet" type="text/css" />
    <link href="css/paymentStyle.css?<?= filemtime("css/paymentStyle.css") ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="assets/logoIcon.ico">
</head>

<body>
    <?php include('components/UserHeader.php'); ?>
    <h1>Payment</h1>

    <div class="MajorContainer">
        <form action="Payment.php" method="POST">


            <div class='OrderFormContainer'>
                <div class="PaymentFormContiner">
                    <h2>Billing address</h2>
                    <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                    <input type="text" name='fname' id='fname' value='<?php echo $UserName ?>' placeholder="Enter your name" required>
                    <label for="Uemail"><i class="fa fa-envelope"></i> Email</label>
                    <input type="email" name='Uemail' id='Uemail' value='<?php echo $UserEmail ?>' placeholder="Enter your email" required>
                    <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                    <input type="text" name='adr' id='adr' placeholder="Enter your address" required>
                    <label for="Ucity"><i class="fa fa-institution"></i> City</label>
                    <input type="text" name='Ucity' id='Ucity' placeholder="Enter your city" required>
                    <div class="row">
                        <div class="col-50">
                            <label for="ProvincecOptions">Province</label>
                            <select name='ProvincecOptions' id='Prooptions' required>
                                <option value='Western Cape'>Western Cape</option>
                                <option value='Northen Cape'>Northen Cape</option>
                                <option value='Eastern Cape'>Eastern Cape</option>
                                <option value='Gauteng'>Gauteng</option>
                                <option value='North West'>North West</option>
                                <option value='Free State'>Free State</option>
                                <option value='Mpumalanga'>Mpumalanga</option>
                                <option value='KwaZulu-Natal'>KwaZulu-Natal</option>
                                <option value='Limpopo'>Limpopo</option>
                            </select>
                        </div>
                        <div class="col-50">
                            <label for="zip">Zip</label>
                            <input type="number" id="zip" name="zip" placeholder="0000" required>
                        </div>
                    </div>
                </div>
                <div class="OrderAddressContainer">
                    <h2>Payment Option</h2>
                    <select name='PaymentOption' id='Poptions'>
                        <option value='Card'>Card</option>
                        <option value='Cash'>Cash</option>
                    </select>

                    <div class='cardContainer' id='cardcont'>
                        <label for="fname">Accepted Cards</label>
                        <div class="icon-container">
                            <i class="fa fa-cc-visa" style="color:navy;"></i>
                            <i class="fa fa-cc-amex" style="color:blue;"></i>
                            <i class="fa fa-cc-mastercard" style="color:red;"></i>
                            <i class="fa fa-cc-discover" style="color:orange;"></i>
                        </div>
                        <label for="cname">Name on Card</label>
                        <input type="text" id="cname" name="cardname" placeholder="Name Surname" required>
                        <label for="ccnum">Credit card number</label>
                        <input type="number" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
                        <label for="expmonth">Exp Month</label>
                        <Select id="expmonth" name="expmonth" required>
                            <option value="january">January</option>
                            <option value="february">February</option>
                            <option value="march">March</option>
                            <option value="april">April</option>
                            <option value="may">May</option>
                            <option value="june">June</option>
                            <option value="july">July</option>
                            <option value="august">August</option>
                            <option value="september">September</option>
                            <option value="october">October</option>
                            <option value="november">November</option>
                            <option value="december">December</option>
                        </Select>
                        <div class="row">
                            <div class="col-50">
                                <label for="expyear">Exp Year</label>
                                <input type="number" id="expyear" name="expyear" placeholder="2018" required>
                            </div>
                            <div class="col-50">
                                <label for="cvv">CVV</label>
                                <input type="number" id="cvv" name="cvv" placeholder="352" required>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="CartContainer">
                <h2>CART</h2>
                <?php
                $UserID = $_SESSION['user_id'];
                $sql = "SELECT cart.CartId, products.Name, products.Price, products.Amount, products.UnitOfMeasurment, cart.Quantity FROM cart LEFT JOIN products ON cart.pID = products.pID WHERE customerID = '$UserID' ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $total = 0;
                    while ($row = $result->fetch_assoc()) {
                        $PN = $row["Name"];
                        $PP = $row["Price"];
                        $PQ = $row["Quantity"];
                        $e = $PP * $PQ;
                        $total = $total + ($PP * $PQ);
                        echo "<p>$PN x $PQ : <b>R $e</b></p>";
                        $Products_tosell[] = ['product_name' => $PN, 'quantity' =>  $PQ, 'price' => $PP];
                    }
                    echo "<div class = 'CartTotal'><p>total: <b>R$total</b> </p></div>";
                }
                ?>
                <button class='Paybtn' class='Paybtn' name='Pay'>Pay - R<?php echo $total ?></button>
            </div>
        </form>
    </div>

    <script>
        // Get the select element by its ID
        const selectElement = document.getElementById('Poptions');
        // Add an event listener to detect changes
        selectElement.addEventListener('change', function() {
            // Get the selected value
            const selectedValue = this.value;
            if (selectedValue == "Cash") {
                document.getElementById('cardcont').style.display = 'none'
                document.getElementById('cname').removeAttribute("required");
                document.getElementById('ccnum').removeAttribute("required");
                document.getElementById('expmonth').removeAttribute("required");
                document.getElementById('expyear').removeAttribute("required");
                document.getElementById('cvv').removeAttribute("required");
                document.getElementById('zip').removeAttribute("required");
            } else {
                document.getElementById('cardcont').style.display = 'block';
                document.getElementById('cname').setAttribute('required', 'required');
                document.getElementById('ccnum').setAttribute('required', 'required');
                document.getElementById('expmonth').setAttribute('required', 'required');
                document.getElementById('expyear').setAttribute('required', 'required');
                document.getElementById('cvv').setAttribute('required', 'required');
                document.getElementById('zip').setAttribute('required', 'required');
            }
        });
    </script>
    <!-- <?php include('components/UserFooter.php') ?> -->
</body>

</html>
<?php
if (isset($_POST['Pay'])) {
    $UserName = $_POST['fname'];
    $EmailName = $_POST['Uemail'];
    $UserAddr = $_POST['adr'];
    $UserCity = $_POST['Ucity'];
    $UserProv = $_POST['ProvincecOptions'];
    $UserPostCode = $_POST['zip'];
    $UserPayOPt = $_POST['PaymentOption'];
    $UserCardName = $_POST['cardname'];
    $UserCardNum = $_POST['cardnumber'];
    $UserCardExpMonth = $_POST['expmonth'];
    $UserCardExpYear = $_POST['expyear'];
    $UserCardCVV = $_POST['cvv'];
    $CustID = $UserID;
    if ($UserPayOPt == 'Cash') {
        $sql = "INSERT INTO `orders`( `OrderFullName`, `OrderEmail`, `OderAddress`, `OrderCity`, `OrderProvince`, `OrderPostalCode`, `OrderPaymentOption`,`customerID`, `OrderStatus`) VALUES ('$UserName','$EmailName','$UserAddr','$UserCity','$UserProv','$UserPostCode','$UserPayOPt','$CustID','Process')";
        if ($conn->query($sql) === TRUE) {
        }
        $order_id = $conn->insert_id;
        foreach ($Products_tosell as $item) {
            $qua = $item['quantity'];
            $pric = $item['price'];
            $name = $item['product_name'];
            $sql = "INSERT INTO `orderitems`( `OrderID`, `Quantity`, `Price`, `Name`) VALUES ('$order_id','$qua','$pric','$name')";
            if ($conn->query($sql) === TRUE) {
            }
        }

        $sql = "DELETE FROM cart where customerID = $CustID";
        if ($conn->query($sql) === TRUE) {
        } else {
          echo "Error deleting record: " . $conn->error;
        }


        mysqli_close($conn);
    } else if($UserPayOPt == 'Card'){

        $sql = "INSERT INTO `orders`( `OrderFullName`, `OrderEmail`, `OderAddress`, `OrderCity`, `OrderProvince`, `OrderPostalCode`, `OrderPaymentOption`,`OrderCardName`, `OrderCardNum`, `OrderExpMonth`, `OrderExpYear`, `OrderCVV`, `customerID`, `OrderStatus`) VALUES ('$UserName','$EmailName','$UserAddr','$UserCity','$UserProv','$UserPostCode','$UserPayOPt','$UserCardName','$UserCardNum','$UserCardExpMonth','$UserCardExpYear','$UserCardCVV','$CustID','Process')";
        if ($conn->query($sql) === TRUE) {
        }
        $order_id = $conn->insert_id;
        foreach ($Products_tosell as $item) {
            $qua = $item['quantity'];
            $pric = $item['price'];
            $name = $item['product_name'];
            $sql = "INSERT INTO `orderitems`( `OrderID`, `Quantity`, `Price`, `Name`) VALUES ('$order_id','$qua','$pric','$name')";
            if ($conn->query($sql) === TRUE) {
            }
        }
        $sql = "DELETE FROM cart where customerID = $CustID";
        if ($conn->query($sql) === TRUE) {
        } else {
          echo "Error deleting record: " . $conn->error;
        }

        mysqli_close($conn);
    }
}
?>