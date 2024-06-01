<!-- TODO: Load from database product itesms -->
<?php
foreach ($Customers   as $x) {
    $prodID = $x->getCustomerID();
    $prodName = $x->getCustomerFName();
    $prodPrice = $x ->getCustomerLName();
    $prodAmount= $x ->getCustomerEmail();
    $prodMeasurment= $x ->getCustomerPassword() ;

    echo(" 
    <tr>
      <td>$prodID</td>
      <td>$prodName</td>
      <td>$prodPrice</td>
      <td>$prodAmount</td>
      <td>$prodMeasurment</td>
    </tr>
    ");
}

?>


