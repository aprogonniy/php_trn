<?php

class BingoTicket30Impl implements BingoTicket
{
    public $id = PREFIX_BINGO_30;
    public $state = STATE_CREATED;
    public $content = [];
    public $type = TYPE_BINGO_30;

    public function __construct($content)
    {
        $this->id .= (string) time();
        $this->state = STATE_CREATED;
        $this->content = $content;
        $this->type = TYPE_BINGO_30;
    }

    public function render()
    {
        print "Ticket " . $this->id . ": [";
        print_r($this->content);
        print " ]";
    }

    public function getId()
    {
        return $this->id;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getType()
    {
        return $this->type;
    }
}