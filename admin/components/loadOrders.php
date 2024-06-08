<?php
foreach ($Ordes  as $x) {
    $OrderID = $x->getOrderID();
    $OrderFullName = $x->getOrderFullName();
    $OrderEmail = $x->getOrderEmail();
    $OrderAddress = $x->getOrderAddress();
    $OrderCity = $x->getOrderCity();
    $OrderProvince = $x->getOrderProvince();
    $OrderPostalCode = $x->getOrderPostalCode();
    $OrderPaymentOption = $x->getOrderPaymentOption();
    $OrderCardName = $x->getOrderCardName();
    $OrderCardNum = $x->getOrderCardNum();
    $OrderExpMonth = $x->getOrderExpMonth();
    $OrderExpYear = $x->getOrderExpYear();
    $OrderCVV = $x->getOrderCVV();
    $OrderDate = $x->getOrderDate();
    $customerID = $x->getCustomerID();
    $OrderStatus = $x->getOrderStatus();
echo$OrderAddress;
    echo ("
    <tr>
        <td>$OrderID</td>
        <td>$OrderFullName</td>
        <td>$OrderEmail</td>
        <td>$OrderAddress</td>
        <td>$OrderCity</td>
        <td>$OrderProvince</td>
        <td>$OrderPostalCode</td>
        <td>$OrderPaymentOption</td>
        <td>$OrderCardName</td>
        <td>$OrderCardNum</td>
        <td>$OrderExpMonth</td>
        <td>$OrderExpYear</td>
        <td>$OrderCVV</td>
        <td>$OrderDate</td>
        <td>$customerID</td>
        <td>$OrderStatus</td>
    </tr>
    ");
}
?>