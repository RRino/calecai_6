<?php

namespace App\Helpers;
use App\Helpers\DatePair;
use Carbon\Carbon;

class DateGenerator
{
    private static $words = [
        'Today' => 'Oggi',
        'January' => 'Gennaio',
        'February' => 'Febbraio',
        'March' => 'Marzo',
        'April' => 'Aprile',
        'May' => 'Maggio',
        'June' => 'Giugno',
        'July' => 'Luglio',
        'August' => 'Agosto',
        'September' => 'Settembre',
        'October' => 'Ottobre',
        'November' => 'Novembre',
        'December' => 'Dicembre'
    ];
    static function monthsFromToday()
    {
        $today = new Carbon();
        $monthsFromToday = [
            new DatePair(
                $today->toDateString(),
                self::$words['Today']
            )
        ];
        $nextStartOfMonth = $today;
        for ($i = 0; $i < count(self::$words) - 1; $i++) {
            $nextStartOfMonth = $nextStartOfMonth->addMonth()->startOfMonth();
            $monthsFromToday[] = new DatePair(
                $nextStartOfMonth->toDateString(),
                '1 ' . self::$words[$nextStartOfMonth->format('F')]
            );
        }
        return $monthsFromToday;
    }

    static function getWords()
    {
        return self::$words;
    }
}
