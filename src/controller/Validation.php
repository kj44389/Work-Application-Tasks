<?php

class Validation
{
    public static function sanitizeText($text)
    {
        return filter_var($text, FILTER_SANITIZE_STRING);
    }

    public static function sanitizeInt($number)
    {
        $number = filter_var($number, FILTER_SANITIZE_NUMBER_INT);
        if(filter_var($number, FILTER_VALIDATE_INT)){
            return $number;
        }
        else{
            return false;
        }
    }

    public static function sanitizeFloat($number)
    {
        $number = filter_var($number, FILTER_SANITIZE_NUMBER_FLOAT);
        if(filter_var($number, FILTER_VALIDATE_FLOAT)){
            return $number;
        }
        else{
            return false;
        }
    }
    public static function validateDate($date){
        try {
            $datetime = new DateTime($date);
            return $datetime->format('Y-m-d');
        } catch(Exception $e) {
            return false;
        }
    }

    public static function checkData($name, $data){
        switch ($name) {
            case 'buyer-name':
                return self::sanitizeText($data);
            case 'buyer-surname':
                return self::sanitizeText($data);
            case 'seller-name':
                return self::sanitizeText($data);
            case 'seller-surname':
                return self::sanitizeText($data);
            case 'buyer-nip-part1':
                return self::sanitizeInt($data);
            case 'buyer-nip-part2':
                return self::sanitizeInt($data);    
            case 'buyer-nip-part3':
                return self::sanitizeInt($data);    
            case 'buyer-nip-part4':
                return self::sanitizeInt($data);
            case 'seller-nip-part1':
                return self::sanitizeInt($data);
            case 'seller-nip-part2':
                return self::sanitizeInt($data);    
            case 'seller-nip-part3':
                return self::sanitizeInt($data);    
            case 'seller-nip-part4':
                return self::sanitizeInt($data);
            case 'date-of-making':
                return self::validateDate($data);
            case 'name':
                return self::sanitizeText($data);    
            case 'unit-price':
                return self::sanitizeFloat($data);    
            case 'quantity':
                return self::sanitizeInt($data);    
            case 'discount':
                return self::sanitizeInt($data);    
            case 'net-value':
                return self::sanitizeFloat($data);    
            case 'vat-value':
                return self::sanitizeInt($data);    
            case 'gross-value':
                return self::sanitizeFloat($data);                                          
            default:
                return true;
        }
    }
}
