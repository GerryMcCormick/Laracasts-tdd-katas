<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FizzBuzz extends Model
{
    public static function execute($no) {
        if($no % 15 == 0) return 'fizzbuzz';
        if($no % 3 == 0) return 'fizz';
        if($no % 5 == 0) return 'buzz';

        return $no;
    }

    public static function executeUpTo($no) {
        return array_map(function($i) {
            return self::execute($i);
        }, range(1, $no));
    }
}
