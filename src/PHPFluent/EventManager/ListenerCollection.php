<?php

namespace PHPFluent\EventManager;

use Countable;
use IteratorAggregate;
use SplObjectStorage;

class ListenerCollection implements IteratorAggregate, Countable
{
    protected $listeners;

    public function __construct()
    {
        $this->listeners = new SplObjectStorage();
    }

    public function count()
    {
        return $this->listeners->count();
    }

    public function getIterator()
    {
        return $this->listeners;
    }

    public function add(Listener $listener)
    {
        $this->listeners->attach($listener);
    }
}
