<?php

class Series implements Iterator
{
    private $programs = array();
    private $seasons = array();
    private $position = 0;

    function __construct($data)
    {
        $seasons = array_keys($data);
        sort($seasons);
        $this->seasons = $seasons;
        $this->programs = $data;
    }


    public function current()
    {
        return $this->programs[$this->key()];
    }

    public function next()
    {
        $this->position++;
    }

    public function key()
    {
        return $this->seasons[$this->position];
    }

    public function valid()
    {
        return isset($this->seasons[$this->position]);
    }

    public function rewind()
    {
        $this->position = 0;
    }

}
