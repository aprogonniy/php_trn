<?php

class AirportDestination
{
    public $stopsNumber = DESTINATION_STOPS_DEFAULT; // count of stops on the way
    public $distance = DESTINATION_DISTANCE_DEFAULT; // total distance in km

    public function __construct($distance, $stopsNumber)
    {
        $this->distance = $distance;
        $this->stopsNumber = $stopsNumber;
    }
}