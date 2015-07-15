<?php

// mock
class TicketContentGenerator
{
    public function generateTicket()
    {
        return -1;
    }

    public function _generateRandomContent($length)
    {
        $a = [];

        for ($i = 0; $i < $length; ++$i) {
            $a[$i] = $i;
        }

        return shuffle($a);
    }
}