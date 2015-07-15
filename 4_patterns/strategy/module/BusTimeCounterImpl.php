<?php

class BusTimeCounterImpl implements TimeCounter
{
    private static $velocity = VELOCITY_BUS; // km per hour
    private static $stopWaitingTime = STOP_TIME_BUS; // 6 minutes <=> 0.1 hrs

    public function calculateTime($destination)
    {
        return ($destination->distance / self::$velocity) + (self::$stopWaitingTime * $destination->stopsNumber);
    }
}