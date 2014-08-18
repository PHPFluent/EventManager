<?php

namespace PHPFluent\EventManager;

class ListenerCollection implements \IteratorAggregate, \Countable
{
    /**
     * @var \SplObjectStorage
     */
    protected $listeners;

    public function __construct()
    {
        $this->listeners = new \SplObjectStorage();
    }

    /**
     * (non-PHPdoc)
     * @see Countable::count()
     */
    public function count()
    {
        return $this->listeners->count();
    }

    /**
     * (non-PHPdoc)
     * @see IteratorAggregate::getIterator()
     */
    public function getIterator()
    {
        return $this->listeners;
    }

    /**
     *
     * @param \PHPFluent\EventManager\Listener $listener
     */
    public function add(Listener $listener)
    {
        $this->listeners->attach($listener);
    }
}
