<?php

namespace App\Entity;

class Fee 
{
    private float $price    ;
    private float $userFees;
    private float $specialFees;
    private float $associationFees;
    private float $storageCosts;
    private float $totalPrice;

    
    public function __construct(
        float $price = 0, 
        float $userFees= 0, 
        float $specialFees = 0, 
        float $associationFees = 0, 
        float $storageCosts = 100,
        float $totalPrice = 100
        ) {
        $this->price = $price;
        $this->userFees = $userFees;
        $this->specialFees = $specialFees;
        $this->associationFees = $associationFees;
        $this->storageCosts = $storageCosts;
        $this->totalPrice = $totalPrice;
    }
    

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of userFees
     */ 
    public function getUserFees()
    {
        return $this->userFees;
    }

    /**
     * Set the value of userFees
     *
     * @return  self
     */ 
    public function setUserFees($userFees)
    {
        $this->userFees = $userFees;

        return $this;
    }

    /**
     * Get the value of specialFees
     */ 
    public function getSpecialFees()
    {
        return $this->specialFees;
    }

    /**
     * Set the value of specialFees
     *
     * @return  self
     */ 
    public function setSpecialFees($specialFees)
    {
        $this->specialFees = $specialFees;

        return $this;
    }

    /**
     * Get the value of associationFees
     */ 
    public function getAssociationFees()
    {
        return $this->associationFees;
    }

    /**
     * Set the value of associationFees
     *
     * @return  self
     */ 
    public function setAssociationFees($associationFees)
    {
        $this->associationFees = $associationFees;

        return $this;
    }

    /**
     * Get the value of storageCosts
     */ 
    public function getStorageCosts()
    {
        return $this->storageCosts;
    }

    /**
     * Set the value of storageCosts
     *
     * @return  self
     */ 
    public function setStorageCosts($storageCosts)
    {
        $this->storageCosts = $storageCosts;

        return $this;
    }

    /**
     * Get the value of totalPrice
     */ 
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * Set the value of totalPrice
     *
     * @return  self
     */ 
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }
}