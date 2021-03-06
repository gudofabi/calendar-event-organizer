<?php

namespace App\Traits;
use Carbon\Carbon;
use DatePeriod;

trait EventTrait
{
    /**
     * This Function is to know which day is it!
     */
    public function getDays($date) {

        $weekMap = [
            0 => 'Sun',
            1 => 'Mon',
            2 => 'Tue',
            3 => 'Wed',
            4 => 'Thu',
            5 => 'Fri',
            6 => 'Sat',
        ];

        $dayOfTheWeek = Carbon::parse($date)->dayOfWeek;
        $weekday = $weekMap[$dayOfTheWeek];

        return $weekday;
    }

    public function getDateRange(Carbon $from,Carbon $to, $inclusive = true) {
        
        if ($from->gt($to)) {
            return null;
        }

        // Clone the date objects to avoid issues, then reset their time
        $from = $from->copy()->startOfDay();
        $to = $to->copy()->startOfDay();

        // Include the end date in the range
        if ($inclusive) {
            $to->addDay();
        }

        $step = \Carbon\CarbonInterval::day();
        $period = new DatePeriod($from, $step, $to);

        // Convert the DatePeriod into a plain array of Carbon objects
        $range = [];

        foreach ($period as $day) {
            $weekday = $this->getDays($day);
            $date = [
                "date" => $day,
                "day"  => $weekday,
            ];

            $range[] = $date;
        }

        return !empty($range) ? $range : null;

    }
}
