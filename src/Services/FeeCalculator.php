<?php 

namespace App\Services;

use App\Entity\Vehicle;

class FeeCalculator 
{
    /**
     * Get all fees and total price
     */
    public function calculateTotalFees(Vehicle $vehicle): array
    {
        $userFees = $this->calculateUserFees($vehicle);
        $specialFees = $this->calculateSpecialFees($vehicle);
        $associationFees = $this->calculateAssociationFees($vehicle);
        return [
            "price" => $vehicle->getPrice(),
            "user_fees" => $userFees,
            "special_fees" => $specialFees,
            "association_fees" => $associationFees,
            "storage_costs" => $vehicle::STORAGE_COSTS,
            "total_price" => $vehicle->getPrice()+$userFees+$specialFees+$associationFees+$vehicle::STORAGE_COSTS,
        ];
    }

    /**
     * Calculate user fees
     * Use the MIN and MAX amounts for the vehicle type
     * 
     * @param Vehicle 
     * 
     * @return float
     */
    private function calculateUserFees(Vehicle $vehicle): float
    {
        $min = $vehicle::MIN;
        $max = $vehicle::MAX;
        $amount = $vehicle->getPrice()*($vehicle::USER_FEES/100);

        if($min <= $amount && $amount <= $max) {
            return $amount;
        } elseif($amount < $min) {
            return $min;
        } elseif($amount > $max) { 
            return $max;
        }
    }

    /**
     * Caculate special fees
     * Use the SPECIAL_FEE amount for the vehicle type
     * 
     * @param Vehicle
     * 
     * @return float
     */
    private function calculateSpecialFees(Vehicle $vehicle): float
    {
        return $vehicle->getPrice() * ($vehicle::SPECIAL_FEE/100);
    }

    /**
     * Calculate association fees
     * Use the price to determine the fee 
     * 
     * @param Vehicle 
     * 
     * @return float
     */
    private function calculateAssociationFees(Vehicle $vehicle): float
    {
        $price = $vehicle->getPrice();
        if(1 <= $price && 500 >= $price) {
            return 5;
        } elseif(500 < $price && 1000 >= $price) {
            return 10;
        } elseif(1000 < $price && 3000>= $price) {
            return 15;
        } else {
            return 20;
        }
    }
}