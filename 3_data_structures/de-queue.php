<?php

class DeQueue
{
    private $elements = [];

    public function __construct($elements)
    {
        self::$elements = $elements;
    }

    function aMemberFunc()
    {
        print 'Inside `aMemberFunc()`';
    }
}