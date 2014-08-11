<?php

namespace PHPFluent\EventManager;

class Manager
{
    protected $eventList = array();

    protected function event($eventName)
    {
        if (! isset($this->eventList[$eventName])) {
            $this->eventList[$eventName] = new Event($eventName);
        }

        return $this->eventList[$eventName];
    }

    public function addListener($eventName, callable $callable)
    {
        $this->event($eventName)->attach($callable);
    }

    public function dispatchEvent($eventName, $data = null)
    {
        $this->event($eventName)->notify($data);
    }

    public function __set($property, $value)
    {
        $this->addListener($property, $value);
    }

    public function __call($eventName, array $arguments = array())
    {
        $argument = null;
        if (! empty($arguments)) {
            $argument = array_shift($arguments);
        }

        $this->dispatchEvent($eventName, $argument);
    }
}
