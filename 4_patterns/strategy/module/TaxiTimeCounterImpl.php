<?php

class TaxiTimeCounterImpl implements TimeCounter
{
    private static $velocity = VELOCITY_TAXI; // km per hour

    public function calculateTime($destination)
    {
        return $destination->distance / self::$velocity;
    }
}