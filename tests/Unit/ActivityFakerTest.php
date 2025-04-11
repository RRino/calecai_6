<?php
use App\Helpers\ActivityFaker;


it('is a class', function () {
    $faker = new ActivityFaker('- 1 year', '+ 1 year');

    expect($faker)->toBeInstanceOf(ActivityFaker::class);
});

it('has a getStartDay method that return a DateTime', function () {
    $faker = new ActivityFaker('- 1 year', '+ 1 year');

    expect($faker->getStartDay())->toBeInstanceOf(DateTime::class);
});

describe('getStartDay method:', function () {
    it(
        'returns date within given upper and lower limits',
        function () {
            $fakerOneY = new ActivityFaker('- 1 year', '+ 1 year');
            $oneYear = new DateInterval(('P1Y'));
            $now = new DateTime();
            $oneYearFromNow = clone $now;
            $oneYearFromNow->add($oneYear);
            $oneYearAgo = clone $now;
            $oneYearAgo->sub($oneYear);

            $fakerSixM = new ActivityFaker('- 6 months', '+ 6 months');
            $sixMonths = new DateInterval(('P6M'));
            $now = new DateTime();
            $sixMonthsFromNow = clone $now;
            $sixMonthsFromNow->add($sixMonths);
            $sixMonthsAgo = clone $now;
            $sixMonthsAgo->sub($sixMonths);

            expect($fakerOneY->getStartDay())->toBeGreaterThan($oneYearAgo);
            expect($fakerOneY->getStartDay())->toBeLessThan($oneYearFromNow);
            expect($fakerSixM->getStartDay())->toBeGreaterThan($sixMonthsAgo);
            expect($fakerSixM->getStartDay())->toBeLessThan($sixMonthsFromNow);
        }
    );
});

describe('getEndDay method:', function () {
    it('returns activity duration of one day, if unset', function () {
        $instances = 20;
        $faker = new ActivityFaker('- 1 year', '+ 1 year');

        for ($i = 0; $i < $instances; $i++) {
            expect($faker->getEndDay()->getTimestamp())->
                toBe($faker->getStartDay()->getTimestamp());
        }
    });
    it(
        'returns activity duration with differet values, when set',
        function () {
            $instances = 50;
            $collectedDurations = [];

            for ($i = 0; $i < $instances; $i++) {
                $faker = new ActivityFaker(
                    '- 1 year',
                    '+ 1 year',
                    [1 => 0.8, 5 => 0.2]
                );
                $daysDiff = $faker->getEndDay()->
                    diff($faker->getStartDay())->format('%d') + 1;
                $collectedDurations[] = $daysDiff;
            }
            $durationsOccurances = array_count_values($collectedDurations);
            expect($durationsOccurances[1])->toBeGreaterThan(39);
            $longerThenOneDayOccurance = array_sum($durationsOccurances) - $durationsOccurances[1];
            expect($longerThenOneDayOccurance)->toBeGreaterThanOrEqual(4);
        }
    );
});


describe('getStartEnrollmentDay and getEndEnrollment day methods:', function () {
    it(
        'getStartEnrollmentDay returns between 3 months and 1 week before starting day',
        function () {
            for ($i = 0; $i < 20; $i++) {
                $faker = new ActivityFaker('- 1 year', '+ 1 year');
                $upperLimit = clone $faker->getStartDay();
                $lowerLimit = clone $faker->getStartDay();
                $upperLimit->modify('-3 months');

                expect($faker->getStartEnrollmentDay())->toBeBetween(
                    $upperLimit,
                    $lowerLimit
                );
            }
        }
    );
    it(
        'getEndEnrollmentDay returns between startEnrollmentDay and starting day',
        function () {
            for ($i = 0; $i < 20; $i++) {
                $faker = new ActivityFaker('- 1 year', '+ 1 year');
                expect($faker->getEndEnrollmentDay())->
                    toBeBetween(
                        $faker->getStartEnrollmentDay(),
                        $faker->getStartDay()
                    );
            }
        }
    );
});

describe('getLauchDay method', function () {
    it('returns 3 months before starting day', function () {
        for ($i = 0; $i < 20; $i++) {
            $faker = new ActivityFaker('- 1 year', '+ 1 year');
            $threeMonthsBeforeStart = clone $faker->getStartDay();
            $threeMonthsBeforeStart->modify('-3 months');
            expect($faker->getLauchDay()->getTimestamp())->
                toBe($threeMonthsBeforeStart->getTimestamp());
        }
    });
});