<?php

namespace App\Helpers;

use Datetime;

/**
 * Provide fake Datetime object for faking Attivita
 */
class ActivityFaker
{
    /**
     * The day the activity starts
     * @var Datetime $startDay
     */
    protected Datetime $startDay;
    /**
     * The day the activity ends.
     * It depends on $durations.
     * @var Datetime $endDay
     */
    protected Datetime $endDay;
    /**
     * Activity duration with weight
     * 
     * Associative array with duration as key and weight as value. 
     * [2 => 0.8. 7 => 0.2] means 80% activities lasts 2 days,
     * 20% lasts one week
     * @var Datetime
     */
    protected array $durations;
    /**
     * First day you can enroll
     * Random between 3 months and 1 week before $startDay.
     * @var Datetime
     */
    protected Datetime $startEnrollmentDay;
    /**
     * Last day you can enroll.
     * Random between $startEnrollmentDay and $startDay;
     * @var Datetime
     */
    protected Datetime $endEnrollmentDay;

    public function __construct(
        string $startDay,
        string $endDate,
        array $durations = [1 => 1]
    ) {
        $this->startDay = fake()->dateTimeBetween($startDay, $endDate);
        $endDayUpperLimit = clone $this->startDay;
        $this->durations = $durations;
        $totalWeight = array_sum($durations);
        $randFloat = rand(0, $totalWeight * 1000) / 1000;
        arsort($durations);

        foreach ($durations as $duration => $weight) {
            $randFloat -= $weight;
            if ($randFloat < 0) {
                $diffInDays = $duration - 1; // if endDay - startDay == 0 then duration is 1
                $endDayUpperLimit->modify("+$diffInDays day");
                $this->endDay = fake()->
                    dateTimeBetween($this->startDay, $endDayUpperLimit);
                break;
            }
        }

        $enrollmentdDayUpperLImit = clone $this->startDay;
        $enrollmentdDayUpperLImit->modify('-3 months');
        $enrollmentdDayLowerLimit = clone $this->startDay;
        $enrollmentdDayLowerLimit->modify('-1 week');
        $this->startEnrollmentDay = fake()->dateTimeBetween(
            $enrollmentdDayUpperLImit,
            $enrollmentdDayLowerLimit
        );
        $this->endEnrollmentDay = fake()->dateTimeBetween(
            $enrollmentdDayLowerLimit,
            $this->startDay
        );

    }
    /**
     * Returns the day the activity starts.
     * @return Datetime
     */
    public function getStartDay()
    {
        return $this->startDay;
    }
    /**
     * Returns the day the activity ends.
     * @return Datetime
     */

    public function getEndDay()
    {
        return $this->endDay;
    }
    /**
     * Returns the day the enrollment starts.
     * @return Datetime
     */
    public function getStartEnrollmentDay()
    {
        return $this->startEnrollmentDay;
    }
    /**
     * Returns the day the enrollment ends.
     * @return Datetime
     */
    public function getEndEnrollmentDay()
    {
        return $this->endEnrollmentDay;
    }
    /**
     * Return the day the activity is lauched.
     * @return Datetime
     */
    public function getLauchDay() {
        $lauchDay = clone $this->getStartDay();
        $lauchDay->modify('- 3 months');
        return $lauchDay;
    }
}