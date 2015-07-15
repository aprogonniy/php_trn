<?php

// Mocked data storage.
class Storage
{
    private $elements = [];
    private $currentIndex = 0;

    public function __construct($elements)
    {
        $this->elements = $elements;
    }

    public function getElementByIndex($index)
    {
        return $this->elements[$index];
    }

    public function getElementsCount()
    {
        return count($this->elements);
    }
}