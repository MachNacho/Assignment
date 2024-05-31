<!-- TODO: Load from database product itesms -->
<?php
foreach ($Prod  as $x) {
    $prodID = $x->getProdID();
    $prodName = $x->getProdName();
    $prodPrice = $x ->getProdPrice();
    $prodAmount= $x ->getProdAmount();
    $prodMeasurment= $x ->getProdMeasurement() ;
    $date= $x ->getDate();
    $image = $x ->getImage();
    echo(" 
    <tr>
      <td>$prodID</td>
      <td>$prodName</td>
      <td>$prodPrice</td>
      <td>$prodAmount</td>
      <td>$prodMeasurment</td>
      <td>$date</td>
      <td>$image </td>
    </tr>
    ");
}

?>


