<?php

/**
 * Strategy pattern implementation.
 * @author oprohonnyi@gmail.com
 * @license Apache-2.0
 */


include("module/const.php");

include("module/TimeCounter.php");
include("module/BusTimeCounterImpl.php");
include("module/TaxiTimeCounterImpl.php");
include("module/ShuttleTimeCounterImpl.php");

include("module/TimeCounterContext.php");
include("module/AirportDestination.php");


$destination = new AirportDestination(200, 6);

$strategyBus = new BusTimeCounterImpl();
$strategyTaxi = new TaxiTimeCounterImpl();
$strategyShuttle = new ShuttleTimeCounterImpl();

/* bus time */
TimeCounterContext::$strategy = $strategyBus;
print "You'll get to airport in <br/>- ";
print TimeCounterContext::calculateTimeForDestination($destination);
print " hrs using bus<br/>";

/* shuttle time */
TimeCounterContext::$strategy = $strategyShuttle;
print "- ";
print TimeCounterContext::calculateTimeForDestination($destination);
print " hrs using shuttle<br/>";

/* bus time */
TimeCounterContext::$strategy = $strategyTaxi;
print "- ";
print TimeCounterContext::calculateTimeForDestination($destination);
print " hrs using taxi<br/><br/>";