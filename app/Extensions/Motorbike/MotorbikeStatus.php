<?php 
namespace App\Extensions\Motorbike;

use ReflectionClass;

class MotorbikeStatus {
    const AVAILABLE = 'Available';
    const RENTING = 'Renting';
    const DISABLE = 'Disable';

    static function getStatus() {
        $oClass = new ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }
}
