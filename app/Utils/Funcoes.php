<?php

namespace App\Utils;

use Carbon\Carbon;

class Funcoes {


    public static function formatDateTime($dateTime){
        return Carbon::parse($dateTime)
                    ->subHours(3)
                    ->format('d/m/Y H:i:s');
    }
    
}