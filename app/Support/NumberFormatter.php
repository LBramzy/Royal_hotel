<?php

namespace App\Support;

class NumberFormatter
{
    /**
     * Abbreviate a number into a compact k/m/b format.
     *
     * @param  float|int  $number
     * @param  int  $decimals
     * @return string
     */
    public static function abbreviate(float|int $number, int $decimals = 2): string
    {
        $number = (float) $number;
        $isNegative = $number < 0;
        $number = abs($number);

        if ($number >= 1_000_000_000) {
            $formatted = number_format($number / 1_000_000_000, $decimals) . 'B';
        } elseif ($number >= 1_000_000) {
            $formatted = number_format($number / 1_000_000, $decimals) . 'M';
        } elseif ($number >= 1_000) {
            $formatted = number_format($number / 1_000, $decimals) . 'k';
        } else {
            $formatted = number_format($number, $decimals);
        }

        return $isNegative ? "-{$formatted}" : $formatted;
    }
}