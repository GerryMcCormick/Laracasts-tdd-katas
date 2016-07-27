<?php
/**
 * Created by PhpStorm.
 * User: gerrymccormick
 * Date: 15/06/2016
 * Time: 14:17
 */

namespace App;


class StringCalculator
{
    const MAX_NUMBER_ALLOWED = 1000;

    /**
     * @param $sumString
     * @return int
     */
    public static function add($sumString) {
        $numbers = collect(self::parseNumbers($sumString));
        
        return $numbers->sum( function ($no) {
            self::guardAgainstInvalidNumber($no);

            if($no >= self::MAX_NUMBER_ALLOWED) return 0;

            return $no;
        });
    }

    /**
     * @param $sumString
     * @return array
     */
    private static function parseNumbers($sumString)
    {
        return array_map('intval', preg_split('/\s*(,|\\\n)\s*/', $sumString));
    }

    /**
     * @param $no
     */
    private static function guardAgainstInvalidNumber($no)
    {
        if ($no < 0) throw new \InvalidArgumentException("Invalid number provided: {$no}");
    }
}