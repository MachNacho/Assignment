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
    public function getOrderID()
    {
        return $this->OrderID;
    }
    // Method to display the order details
    // Method to display the order details
    public function displayOrderDetails()
    {
        echo "
        <div class='OrderForm' id='order-details{$this->OrderID}'>

            <div class='OderItemInfoContainer' id ='Status'><strong>Order Status:</strong> {$this->OrderStatus}</div>

            <div class = 'half'>
                <div class ='OderItemInfoContainer'>
                <div class='OrderItemInfos'><strong>Order ID:</strong> {$this->OrderID}</div>
                <div class='OrderItemInfos'><strong>Order Full Name:</strong> {$this->OrderFullName}</div>
                <div class='OrderItemInfos'><strong>Order Email:</strong> {$this->OrderEmail}</div>
                <div class='OrderItemInfos'><strong>Order Address:</strong> {$this->OrderAddress}</div>
                <div class='OrderItemInfos'><strong>Order City:</strong> {$this->OrderCity}</div>
                <div class='OrderItemInfos'><strong>Order Province:</strong> {$this->OrderProvince}</div>
                <div class='OrderItemInfos'><strong>Order Postal Code:</strong> {$this->OrderPostalCode}</div>
                </div>
            </div>
            <div class = 'half'>
                <div class ='OderItemInfoContainer'>
                <div class='OrderItemInfos'><strong>Order Payment Option:</strong> {$this->OrderPaymentOption}</div>
                <div class='OrderItemInfos'><strong>Order Card Name:</strong> {$this->OrderCardName}</div>
                <div class='OrderItemInfos'><strong>Order Card Number:</strong> {$this->OrderCardNum}</div>
                <div class='OrderItemInfos'><strong>Order Expiration Month:</strong> {$this->OrderExpMonth}</div>
                <div class='OrderItemInfos'><strong>Order Expiration Year:</strong> {$this->OrderExpYear}</div>
                <div class='OrderItemInfos'><strong>Order CVV:</strong> {$this->OrderCVV}</div>
                <div class='OrderItemInfos'><strong>Order Date:</strong> {$this->OrderDate}</div>
                <div class='OrderItemInfos'><strong>Customer ID:</strong> {$this->customerID}</div>
                </div>
            </div> ";
    echo " </div>";
    }
}
