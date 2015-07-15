<?php

class TimeCounterContext
{
    public static $strategy = STRATEGY_VALUE_DEFAULT;

    public static function calculateTimeForDestination($destination)
    {
        return self::$strategy->calculateTime($destination);
    }
}
