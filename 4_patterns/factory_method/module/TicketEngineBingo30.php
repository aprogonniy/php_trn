<?php

class TicketEngineBingo30 extends TicketContentGenerator
{
    public function generateTicket()
    {
        $contentSize = LENGTH_BINGO_30;
        $content = "";

        $content = $this->_generateRandomContent($contentSize);

        return new BingoTicket30Impl($content);
    }
}