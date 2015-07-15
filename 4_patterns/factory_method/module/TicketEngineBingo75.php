<?php

class TicketEngineBingo75 extends TicketContentGenerator
{
    public function generateTicket()
    {
        $contentSize = LENGTH_BINGO_75;
        $content = "";

        $content = $this->_generateRandomContent($contentSize);

        return new BingoTicket75Impl($content);
    }
}