<?php 
namespace App\Extensions\Rental;

use ReflectionClass;

class RentalStatus {
    const UNPAID = 'Unpaid';
    const PAID = 'Paid';
    const RENTING = 'Renting';
    const COMPLETED = 'Completed';
    const CANCELED = 'Canceled';
    static function getStatus() {
        $oClass = new ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }

}