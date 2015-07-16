<?php

/**
 * De-queue data structure implementation.
 * @author oprohonnyi@gmail.com
 * @license Apache-2.0
 */

?>

    <h4>De-queue example</h4>

<?php

class DeQueue
{
    private $elements = [];

    public function __constructor($elements)
    {
        $this->elements = $elements;
    }

    // Add element at front.
    public function addAtFront($element)
    {
        $arr = [];

        $arr[0] = $element;

        for ($i = 0; $i < count($this->elements); $i++) {
            $arr[$i + 1] = $this->elements[$i];
        }

        $this->elements = $arr;

        return $this->elements[0];
    }

    // Add element at back.
    public function addAtBack($element)
    {
        return $this->elements[count($this->elements)] = $element;
    }

    // Add element to end.
    public function addToEnd($element)
    {
        return $this->elements[count($this->elements)] = $element;
    }

    // Remove first element.
    public function removeFirst()
    {
        return $this->removeElementByIndex(0);
    }

    // Remove last element.
    public function removeLast()
    {
        return $this->removeElementByIndex(count($this->elements) - 1);
    }

    // Examine first element.
    public function getFirst()
    {
        return $this->elements[0];
    }

    // Examine last element.
    public function getLast()
    {
        return $this->elements[count($this->elements) - 1];
    }

    public function show()
    {
        return join(", ", $this->elements);
    }

    private function removeElementByIndex($index)
    {
        if ($index < 0 || $index > count($this->elements) - 1) {
            return -1;
        }

        $arr = [];
        $deletedEl = null;
        for ($i = 0; $i < count($this->elements); $i++) {
            if ($i === $index) {
                $deletedEl = $this->elements[$i];
                continue;
            }
            array_push($arr, $this->elements[$i]);
        }
        $this->elements = $arr;

        return $deletedEl;
    }
}


/*
* Using.
*/
$deQueue = new DeQueue();
$deQueue->addAtBack(2);
$deQueue->addAtFront(1);
$deQueue->addAtBack(3);

print "Initial de-queue: " . $deQueue->show() . "<br/>";

print "<br/>Delete first element<br/>";
$deQueue->removeFirst();
print "Delete last element<br/>";
$deQueue->removeLast();

print "<br/>Resulted de-queue: " . $deQueue->show() . "<br/>";