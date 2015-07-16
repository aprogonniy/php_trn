<?php

/**
 * Priority queue data structure implementation.
 * @author oprohonnyi@gmail.com
 * @license Apache-2.0
 */

?>

    <h4>Priority queue example</h4>

<?php

/*
* Node data structure.
*/

class Node
{
    public $data = null;
    public $priority = 0;

    public function __construct($data, $priority)
    {
        $this->data = $data;
        $this->priority = $priority;
    }
}


/*
* Priority queue class.
*/

class PriorityQueue
{
    private $elements = [];

    public function push($node)
    {
        return $this->elements[count($this->elements)] = $node;
    }

    public function pop()
    {
        $deleteIndex = $this->getIndexOfHighestPriorityElement();
        $deletedNode = null;
        $arr = [];
        for ($i = 0; $i < count($this->elements); $i++) {
            if ($i !== $deleteIndex) {
                array_push($arr, $this->elements[$i]);
            } else {
                $deletedNode = $this->elements[$i];
            }
        }

        $this->elements = $arr;

        return $deletedNode;
    }

    public function show()
    {
        $str = "";

        for ($i = 0; $i < count($this->elements); $i++) {
            $str .= "{" . $this->elements[$i]->data . ", " . $this->elements[$i]->priority . "} ";
        }

        return $str;
    }

    private function getIndexOfHighestPriorityElement()
    {
        $highestPriority = $this->elements[0]->priority;
        $index = 0;

        for ($i = 1; $i < count($this->elements); $i++) {
            if ($this->elements[$i]->priority < $highestPriority) {
                $highestPriority = $this->elements[$i]->priority;
                $index = $i;
            }
        }

        return $index;
    }
}


/*
* Using.
*/
$pq = new PriorityQueue();
$pq->push(new Node("test8", 8));
$pq->push(new Node("test6", 6));
$pq->push(new Node("test0", 0));
$pq->push(new Node("test3", 3));
$pq->push(new Node("test1", 1));

print "Initial queue: " . $pq->show() . "<br/>";

print "<br/>Delete highest priority element<br/>";
$pq->pop();

print "<br/>Resulted queue: " . $pq->show() . "<br/>";