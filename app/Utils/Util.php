<?php

namespace App\Utils;

use Illuminate\Support\Facades\Hash;

class Util
{
    public static function defaultPassword(){
        return Hash::make('mudar123');
    }
}