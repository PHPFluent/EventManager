<?php

namespace PHPFluent\EventManager;

class Event
{
    protected $name;
    protected $listenerList;
    protected $propagationStopped = false;

    public function __construct($name)
    {
        $this->name = $name;
        $this->listenerList = new ListenerCollection();
    }

    public function getName()
    {
        return $this->name;
    }

    public function getListeners()
    {
        return $this->listenerList;
    }

    public function stopPropagation()
    {
        $this->propagationStopped = true;
    }

    public function isPropagationStopped()
    {
        return $this->propagationStopped;
    }
}
