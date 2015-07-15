<?php

/**
 * Registry pattern implementation.
 * @author oprohonnyi@gmail.com
 * @license Apache-2.0
 */


include("module/PresentationInfo.php");
include("module/PrizeInfo.php");

include("module/RoundInfo.php");

include("module/ServerResponsesManager.php");


$roundInfoServerResponse = new RoundInfo(new PresentationInfo(), new PrizeInfo());

$serverResponsesManager = new ServerResponsesManager();
$serverResponsesManager->setRoundInfoResponse($roundInfoServerResponse);

print "Round info data: " . serialize($serverResponsesManager->getRoundInfoData()) . "<br/>";
print "Presentation info data: " . serialize($serverResponsesManager->getPresentationInfoData()) . "<br/>";
print "Winners info data: " . $serverResponsesManager->getRoundWinners();