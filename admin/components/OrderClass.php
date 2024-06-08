<?php
class Order
{
    // Properties
    private $OrderID;
    private $OrderFullName;
    private $OrderEmail;
    private $OrderAddress;
    private $OrderCity;
    private $OrderProvince;
    private $OrderPostalCode;
    private $OrderPaymentOption;
    private $OrderCardName;
    private $OrderCardNum;
    private $OrderExpMonth;
    private $OrderExpYear;
    private $OrderCVV;
    private $OrderDate;
    private $customerID;
    private $OrderStatus;

    // Constructor
    public function __construct($OrderID, $OrderFullName, $OrderEmail, $OrderAddress, $OrderCity, $OrderProvince, $OrderPostalCode, $OrderPaymentOption, $OrderCardName, $OrderCardNum, $OrderExpMonth, $OrderExpYear, $OrderCVV, $OrderDate, $customerID, $OrderStatus)
    {
        $this->OrderID = $OrderID;
        $this->OrderFullName = $OrderFullName;
        $this->OrderEmail = $OrderEmail;
        $this->OrderAddress = $OrderAddress;
        $this->OrderCity = $OrderCity;
        $this->OrderProvince = $OrderProvince;
        $this->OrderPostalCode = $OrderPostalCode;
        $this->OrderPaymentOption = $OrderPaymentOption;
        $this->OrderCardName = $OrderCardName;
        $this->OrderCardNum = $OrderCardNum;
        $this->OrderExpMonth = $OrderExpMonth;
        $this->OrderExpYear = $OrderExpYear;
        $this->OrderCVV = $OrderCVV;
        $this->OrderDate = $OrderDate;
        $this->customerID = $customerID;
        $this->OrderStatus = $OrderStatus;
    }
    // Getters
    public function getOrderID()
    {
        return $this->OrderID;
    }

    public function getOrderFullName()
    {
        return $this->OrderFullName;
    }

    public function getOrderEmail()
    {
        return $this->OrderEmail;
    }

    public function getOrderAddress()
    {
        return $this->OrderAddress;
    }

    public function getOrderCity()
    {
        return $this->OrderCity;
    }

    public function getOrderProvince()
    {
        return $this->OrderProvince;
    }

    public function getOrderPostalCode()
    {
        return $this->OrderPostalCode;
    }

    public function getOrderPaymentOption()
    {
        return $this->OrderPaymentOption;
    }

    public function getOrderCardName()
    {
        return $this->OrderCardName;
    }

    public function getOrderCardNum()
    {
        return $this->OrderCardNum;
    }

    public function getOrderExpMonth()
    {
        return $this->OrderExpMonth;
    }

    public function getOrderExpYear()
    {
        return $this->OrderExpYear;
    }

    public function getOrderCVV()
    {
        return $this->OrderCVV;
    }

    public function getOrderDate()
    {
        return $this->OrderDate;
    }

    public function getCustomerID()
    {
        return $this->customerID;
    }

    public function getOrderStatus()
    {
        return $this->OrderStatus;
    }

    public function displayOrderDetailsAsRow()
    {
        $OrderID = $this->getOrderID();
        $OrderFullName = $this->getOrderFullName();
        $OrderEmail = $this->getOrderEmail();
        $OrderAddress = $this->getOrderAddress();
        $OrderCity = $this->getOrderCity();
        $OrderProvince = $this->getOrderProvince();
        $OrderPostalCode = $this->getOrderPostalCode();
        $OrderPaymentOption = $this->getOrderPaymentOption();
        $OrderCardName = $this->getOrderCardName();
        $OrderCardNum = $this->getOrderCardNum();
        $OrderExpMonth = $this->getOrderExpMonth();
        $OrderExpYear = $this->getOrderExpYear();
        $OrderCVV = $this->getOrderCVV();
        $OrderDate = $this->getOrderDate();
        $customerID = $this->getCustomerID();
        $OrderStatus = $this->getOrderStatus();

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
}
