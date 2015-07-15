<?php

/**
 * Factory method pattern implementation.
 * @author oprohonnyi@gmail.com
 * @license Apache-2.0
 */


include("module/const.php");

include("module/BingoTicket.php");
include("module/BingoTicket30Impl.php");
include("module/BingoTicket75Impl.php");

include("module/TicketContentGenerator.php");
include("module/TicketEngineBingo30.php");
include("module/TicketEngineBingo75.php");


$ticketEngine30 = new TicketEngineBingo30();
$ticketEngine75 = new TicketEngineBingo75();

print "Bingo Ticket 30<br/>";
$ticket30 = $ticketEngine30->generateTicket();
$ticket30->render();
print "<br/><br/>";

print "Bingo Ticket 75<br/>";
$ticket75 = $ticketEngine75->generateTicket();
$ticket75->render();