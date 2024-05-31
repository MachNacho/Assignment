<?php
class Product {
    // Properties
    private $prodID = 0;
    private $prodName='null';
    private $prodPrice = 0;
    private $prodAmount = 0;
    private $prodMeasurement ='null';
    private $date = 0;
    private $image ='null';

    // Constructor
    public function __construct($prodID, $prodName, $prodPrice, $prodAmount, $prodMeasurement, $date, $image) {
        $this->prodID = $prodID;
        $this->prodName = $prodName;
        $this->prodPrice = $prodPrice;
        $this->prodAmount = $prodAmount;
        $this->prodMeasurement = $prodMeasurement;
        $this->date = $date;
        $this->image = $image;
    }

    // Getters
    public function getProdID() {
        return $this->prodID;
    }

    public function getProdName() {
        return $this->prodName;
    }

    public function getProdPrice() {
        return $this->prodPrice;
    }

    public function getProdAmount() {
        return $this->prodAmount;
    }

    public function getProdMeasurement() {
        return $this->prodMeasurement;
    }

    public function getDate() {
        return $this->date;
    }

    public function getImage() {
        return $this->image;
    }

    // Setters
    public function setProdID($prodID) {
        $this->prodID = $prodID;
    }

    public function setProdName($prodName) {
        $this->prodName = $prodName;
    }

    public function setProdPrice($prodPrice) {
        $this->prodPrice = $prodPrice;
    }

    public function setProdAmount($prodAmount) {
        $this->prodAmount = $prodAmount;
    }

    public function setProdMeasurement($prodMeasurement) {
        $this->prodMeasurement = $prodMeasurement;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setImage($image) {
        $this->image = $image;
    }
}
?>