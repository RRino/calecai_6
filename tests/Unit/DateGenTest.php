<?php
use Carbon\Carbon;
use App\Helpers\DateGenerator;
use App\Helpers\DatePair;

it('is an array?', function () {
    expect(DateGenerator::monthsFromToday())->toBeArray();
});

it('is an array with 13 items?', function () {
    $months = DateGenerator::monthsFromToday();
    expect(count($months))->toBe(13);
});


it('is an array of DatePair objects?', function () {
    $months = DateGenerator::monthsFromToday();
    foreach ($months as $month) {
        expect($month)->toBeInstanceOf(DatePair::class);
    }
});

it('is the first item today?', function () {
    $months = DateGenerator::monthsFromToday();
    expect($months[0]->nome)->toBe(date('Y-m-d'));
    expect($months[0]->descrizione)->toBe(DateGenerator::getWords()['Today']);
});

it('is the second item next month?', function () {
    $today = new Carbon();
    $nextMonth = $today->addMonth()->startOfMonth();
    $months = DateGenerator::monthsFromToday();
    expect($months[1]->nome)->toBe($nextMonth->toDateString());
    expect($months[1]->descrizione)->toBe('1 ' . DateGenerator::getWords()[$nextMonth->format('F')]);
});

it('is today the 31st of December, since we time travelled to the end of this year?', function () {
    // Time travel to the last day of the year
    $lastOfTheYear = Carbon::createFromDate(date('Y'), 12, 31);
    Carbon::setTestNow($lastOfTheYear);

    $months = DateGenerator::monthsFromToday();

    expect($months[0]->nome)->toBe($lastOfTheYear->toDateString());
    expect($months[0]->descrizione)->toBe(DateGenerator::getWords()['Today']);
});

it('is the second item January, since today is the last day of the year?', function () {
    // Time travel to the last day of the year
    $lastOfTheYear = Carbon::createFromDate(date('Y'), 12, 31);
    Carbon::setTestNow($lastOfTheYear);

    $nextMonth = $lastOfTheYear->addMonth()->startOfMonth();

    $months = DateGenerator::monthsFromToday();
    expect($months[1]->nome)->toBe($nextMonth->toDateString());
    expect($months[1]->descrizione)->toBe('1 ' . DateGenerator::getWords()[$nextMonth->format('F')]);
});

it('is an array with all the months starting from 26th June 2000?', function () {
    // Time travel to 26th June
    $lastOfTheYear = Carbon::createFromDate(2000, 6, 26);
    Carbon::setTestNow($lastOfTheYear);
    $sampleArray = [
        new DatePair('2000-06-26', 'Oggi'),
        new DatePair('2000-07-01', '1 Luglio'),
        new DatePair('2000-08-01', '1 Agosto'),
        new DatePair('2000-09-01', '1 Settembre'),
        new DatePair('2000-10-01', '1 Ottobre'),
        new DatePair('2000-11-01', '1 Novembre'),
        new DatePair('2000-12-01', '1 Dicembre'),
        new DatePair('2001-01-01', '1 Gennaio'),
        new DatePair('2001-02-01', '1 Febbraio'),
        new DatePair('2001-03-01', '1 Marzo'),
        new DatePair('2001-04-01', '1 Aprile'),
        new DatePair('2001-05-01', '1 Maggio'),
        new DatePair('2001-06-01', '1 Giugno'),
    ];

    $months = DateGenerator::monthsFromToday();
    for ($i = 0; $i < count($sampleArray); $i++) {
        expect($months[$i]->nome)->toBe($sampleArray[$i]->nome);
        expect($months[$i]->descrizione)->toBe($sampleArray[$i]->descrizione);
    }
});