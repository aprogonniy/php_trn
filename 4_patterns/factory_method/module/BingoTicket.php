<?php

interface BingoTicket
{
    public function render();

    public function getId();

    public function getState();

    public function setState($state);

    public function getContent();
}