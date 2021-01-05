<?php

class Invoice
{
    private int $ID;
    private string $buyerName;
    private string $buyerSurname;
    private string $sellerName;
    private string $sellerSurname;
    private string $buyerNIP;
    private string $sellerNIP;
    private $dateOfMaking;
    private string $name;
    private float $unitPrice;
    private int $quantity;
    private float $discount;
    private float $netValue;
    private float $vatValue;
    private float $grossValue;
    private $addDate;

    /**
     * Get the value of invoide id
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * Set the value of purchaseInvoiceID
     *
     * @return  self
     */
    public function setID($ID)
    {
        $this->ID = $ID;

        return $this;
    }

    /**
     * Get the value of buyerName
     */
    public function getBuyerName()
    {
        return $this->buyerName;
    }

    /**
     * Set the value of buyerName
     *
     * @return  self
     */
    public function setBuyerName($buyerName)
    {
        $this->buyerName = $buyerName;

        return $this;
    }

    /**
     * Get the value of Buyer Surname
     */
    public function getBuyerSurname()
    {
        return $this->buyerSurname;
    }

    /**
     * Set the value of Buyer Surname
     *
     * @return  self
     */
    public function setBuyerSurname($buyerSurname)
    {
        $this->buyerSurname = $buyerSurname;

        return $this;
    }

    /**
     * Get the value of Seller Name
     */
    public function getSellerName()
    {
        return $this->sellerName;
    }

    /**
     * Set the value of Seller Name
     *
     * @return  self
     */
    public function setSellerName($sellerName)
    {
        $this->sellerName = $sellerName;

        return $this;
    }

    /**
     * Get the value of Seller Surname
     */
    public function getSellerSurname()
    {
        return $this->sellerSurname;
    }

    /**
     * Set the value of Seller Surname
     *
     * @return  self
     */
    public function setSellerSurname($sellerSurname)
    {
        $this->sellerSurname = $sellerSurname;

        return $this;
    }
    /**
     * Get the value of buyerNIP
     */
    public function getBuyerNIP()
    {
        return $this->buyerNIP;
    }

    /**
     * Set the value of buyerNIP
     *
     * @return  self
     */
    public function setBuyerNIP($buyerNIP)
    {
        $this->buyerNIP = $buyerNIP;

        return $this;
    }

    /**
     * Get the value of seller NIP
     */
    public function getSellerNIP()
    {
        return $this->sellerNIP;
    }

    /**
     * Set the value of seller NIP
     *
     * @return  self
     */
    public function setSellerNIP($sellerNIP)
    {
        $this->sellerNIP = $sellerNIP;

        return $this;
    }

    /**
     * Get the value of date Of Making
     */
    public function getDateOfMaking()
    {
        return $this->dateOfMaking;
    }

    /**
     * Set the value of date Of Making
     *
     * @return  self
     */
    public function setDateOfMaking($dateOfMaking)
    {
        $this->dateOfMaking = $dateOfMaking;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of unit Price
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * Set the value of unit Price
     *
     * @return  self
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    /**
     * Get the value of quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of discount
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set the value of discount
     *
     * @return  self
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get the value of net Value
     */
    public function getNetValue()
    {
        return $this->netValue;
    }

    /**
     * Set the value of net Value
     *
     * @return  self
     */
    public function setNetValue($netValue)
    {
        $this->netValue = $netValue;

        return $this;
    }

    /**
     * Get the value of vat Value
     */
    public function getVatValue()
    {
        return $this->vatValue;
    }

    /**
     * Set the value of vat Value
     *
     * @return  self
     */
    public function setVatValue($vatValue)
    {
        $this->vatValue = $vatValue;

        return $this;
    }

    /**
     * Get the value of gross Value
     */
    public function getGrossValue()
    {
        return $this->grossValue;
    }

    /**
     * Set the value of gross Value
     *
     * @return  self
     */
    public function setGrossValue($grossValue)
    {
        $this->grossValue = $grossValue;

        return $this;
    }

    /**
     * Get the value of add Date
     */
    public function getAddDate()
    {
        return $this->addDate;
    }

    /**
     * Set the value of add Date
     *
     * @return  self
     */
    public function setAddDate($addDate)
    {
        $this->addDate = $addDate;

        return $this;
    }
}
