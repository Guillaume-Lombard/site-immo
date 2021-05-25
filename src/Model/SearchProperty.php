<?php

namespace App\Model;

use App\Repository\PropertyRepository;

class SearchProperty
{
   private $minArea;
   private $maxArea;
   private $minRooms;
   private $maxRooms;
   private $type;
   private $housseType;
   private $address;
   private $garage;
   private $swimmingPool;
   private $minPrice;
   private $maxPrice;
   private $buyingOrLeasing;

    /**
     * @return mixed
     */
    public function getMinArea()
    {
        return $this->minArea;
    }

    /**
     * @param mixed $minArea
     */
    public function setMinArea($minArea): void
    {
        $this->minArea = $minArea;
    }

    /**
     * @return mixed
     */
    public function getMaxArea()
    {
        return $this->maxArea;
    }

    /**
     * @param mixed $maxArea
     */
    public function setMaxArea($maxArea): void
    {
        $this->maxArea = $maxArea;
    }

    /**
     * @return mixed
     */
    public function getMinRooms()
    {
        return $this->minRooms;
    }

    /**
     * @param mixed $minRooms
     */
    public function setMinRooms($minRooms): void
    {
        $this->minRooms = $minRooms;
    }

    /**
     * @return mixed
     */
    public function getMaxRooms()
    {
        return $this->maxRooms;
    }

    /**
     * @param mixed $maxRooms
     */
    public function setMaxRooms($maxRooms): void
    {
        $this->maxRooms = $maxRooms;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getHousseType()
    {
        return $this->housseType;
    }

    /**
     * @param mixed $housseType
     */
    public function setHousseType($housseType): void
    {
        $this->housseType = $housseType;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getGarage()
    {
        return $this->garage;
    }

    /**
     * @param mixed $garage
     */
    public function setGarage($garage): void
    {
        $this->garage = $garage;
    }

    /**
     * @return mixed
     */
    public function getSwimmingPool()
    {
        return $this->swimmingPool;
    }

    /**
     * @param mixed $swimmingPool
     */
    public function setSwimmingPool($swimmingPool): void
    {
        $this->swimmingPool = $swimmingPool;
    }

    /**
     * @return mixed
     */
    public function getMinPrice()
    {
        return $this->minPrice;
    }

    /**
     * @param mixed $minPrice
     */
    public function setMinPrice($minPrice): void
    {
        $this->minPrice = $minPrice;
    }

    /**
     * @return mixed
     */
    public function getMaxPrice()
    {
        return $this->maxPrice;
    }

    /**
     * @param mixed $maxPrice
     */
    public function setMaxPrice($maxPrice): void
    {
        $this->maxPrice = $maxPrice;
    }

    /**
     * @return mixed
     */
    public function getBuyingOrLeasing()
    {
        return $this->buyingOrLeasing;
    }

    /**
     * @param mixed $buyingOrLeasing
     */
    public function setBuyingOrLeasing($buyingOrLeasing): void
    {
        $this->buyingOrLeasing = $buyingOrLeasing;
    }




}