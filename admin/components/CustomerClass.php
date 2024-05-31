<?php
class Customer {
    // Properties
    private $customerID = 0;
    private $customerFName = 'null';
    private $customerLName= 'null';
    private $customerEmail= 'null';
    private $customerPassword= 'null';

    // Constructor
    public function __construct($customerID, $customerFName, $customerLName, $customerEmail, $customerPassword) {
        $this->customerID = $customerID;
        $this->customerFName = $customerFName;
        $this->customerLName = $customerLName;
        $this->customerEmail = $customerEmail;
        $this->customerPassword = $customerPassword;
    }

    // Getters
    public function getCustomerID() {
        return $this->customerID;
    }

    public function getCustomerFName() {
        return $this->customerFName;
    }

    public function getCustomerLName() {
        return $this->customerLName;
    }

    public function getCustomerEmail() {
        return $this->customerEmail;
    }

    public function getCustomerPassword() {
        return $this->customerPassword;
    }

    // Setters
    public function setCustomerID($customerID) {
        $this->customerID = $customerID;
    }

    public function setCustomerFName($customerFName) {
        $this->customerFName = $customerFName;
    }

    public function setCustomerLName($customerLName) {
        $this->customerLName = $customerLName;
    }

    public function setCustomerEmail($customerEmail) {
        $this->customerEmail = $customerEmail;
    }

    public function setCustomerPassword($customerPassword) {
        $this->customerPassword = $customerPassword;
    }
}
?>
