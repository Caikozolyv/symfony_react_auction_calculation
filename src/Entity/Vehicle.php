<?php

namespace App\Entity;

class Vehicle 
{
    protected string $type;
    protected float $price;
    public const USER_FEES = 10;

    public const STORAGE_COSTS = 100;
    public function __construct(float $price = 0) 
    {
        $this->price = $price;
    }



    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
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
}