<?php

// Lazy loader class.
class PaginationManager
{
    private $elements = [];
    private $storage = null;
    private $numOfElementsPerPage = 0;
    private $numOfPages = 0;

    public function __construct($dataStorage, $numOfElementsPerPage)
    {
        $this->storage = $dataStorage;
        $this->numOfElementsPerPage = $numOfElementsPerPage;
        $this->numOfPages = ceil($dataStorage->getElementsCount() / $this->numOfElementsPerPage);
    }

    public function showPage($pageNumber)
    {
        if ($pageNumber <= 0 || $pageNumber > $this->numOfPages) {
            throw new Exception("Wrong value of page number parameter!");
        }

        $str = "";
        $startIndex = ($pageNumber - 1) * $this->numOfElementsPerPage;
        $endIndex = $startIndex + $this->numOfElementsPerPage;
        $valueFromStorage = null;

        for ($i = $startIndex; $i < $endIndex; $i++) {

            // Lazy loading logic.
            if (!isset($this->elements[$i])) {
                $valueFromStorage = $this->storage->getElementByIndex($i);
                if (!isset($valueFromStorage)) {
                    break;
                }

                $this->elements[$i] = $valueFromStorage;
            }

            $str .= $this->elements[$i] . " ";
        }

        print "Page #" . $pageNumber . ": " . $str;
    }

    public function showNumberOfElementsInMemory()
    {
        $loadedElementsCount = 0;

        for ($i = 0; $i < count($this->elements); $i++) {
            if (isset($this->elements[$i])) {
                $loadedElementsCount++;
            }
        }

        print "Number of loaded elements: " . $loadedElementsCount;
    }
}