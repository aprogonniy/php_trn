<?php

/**
 * Lazy load (lazy initialization) pattern implementation.
 * @author oprohonnyi@gmail.com
 * @license Apache-2.0
 */


include("module/Storage.php");
include("module/PaginationManager.php");


$ticketStorage = new Storage(['ticket1', 'ticket2', 'ticket3', 'ticket4',
    'ticket5', 'ticket6', 'ticket7', 'ticket8',
    'ticket9', 'ticket10', 'ticket11', 'ticket12',
    'ticket13', 'ticket14', 'ticket15', 'ticket16',
    'ticket17', 'ticket18', 'ticket19', 'ticket20'
]);

$ticketPagination = new PaginationManager($ticketStorage, 4);

print "Initial pagination state<br/>";
$ticketPagination->showNumberOfElementsInMemory();
print "<br/><br/>";

$ticketPagination->showPage(1);
print "<br/>";
$ticketPagination->showPage(3);
print "<br/><br/>";

print "Resulted pagination state<br/>";
$ticketPagination->showNumberOfElementsInMemory();