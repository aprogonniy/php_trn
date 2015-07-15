<?php

class RoundInfo
{
    public $presentationInfo = null;
    public $prizeInfo = null;

    public function __construct($presentationInfo, $prizeInfo)
    {
        $this->presentationInfo = $presentationInfo;
        $this->prizeInfo = $prizeInfo;
    }
}