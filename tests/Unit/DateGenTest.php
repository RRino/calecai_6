<?php
use Carbon\Carbon;
use App\Helpers\DateGenerator;
use App\Helpers\DatePair;

it('is an array?', function () {
    expect(DateGenerator::monthsFromToday())->toBeArray();
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

it('is today the 31st of December?', function () {
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