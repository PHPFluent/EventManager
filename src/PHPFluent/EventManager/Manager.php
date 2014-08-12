<?php

namespace PHPFluent\EventManager;

class Manager
{
    protected $events = array();

    public function getEvent($eventName)
    {
        if (! isset($this->events[$eventName])) {
            $this->events[$eventName] = new Event($eventName);
        }

        return $this->events[$eventName];
    }

    public function addEventListener($eventName, $listener)
    {
        if (is_callable($listener)) {
            $listener = new ListenerCallback($listener);
        }

        $this->getEvent($eventName)->getListeners()->add($listener);
    }

    public function dispatchEvent($eventName, array $context = array())
    {
        $event = $this->getEvent($eventName);
        foreach ($event->getListeners() as $listener) {
            if ($event->isPropagationStopped()) {
                break;
            }
            $listener->execute($event, $context);
        }
    }

    public function __set($eventName, $listener)
    {
        $this->addEventListener($eventName, $listener);
    }

    public function __call($eventName, array $arguments = array())
    {
        $argument = array();
        if (! empty($arguments)) {
            $argument = array_shift($arguments);
        }

        $this->dispatchEvent($eventName, $argument);
    }
}
