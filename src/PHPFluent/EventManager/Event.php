<?php

namespace PHPFluent\EventManager;

use SplObjectStorage;

class Event
{
    protected $name;
    protected $listenerList;

    public function __construct($name)
    {
        $this->name = $name;
        $this->listenerList = new SplObjectStorage();
    }

    public function attach(callable $listener)
    {
        $this->listenerList[$listener] = $listener;
    }

    public function notify($data = null)
    {
        foreach ($this->listenerList as $listener) {
            $listener($data);
        }
    }
}
