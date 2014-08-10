<?php

namespace PHPFluent\EventManager;

class Manager
{
    protected $eventList = array();

    public function addListener($id, callable $callable)
    {
        $this->checkEvent($id);

        $this->eventList[$id]->attach($callable);
    }

    public function dispatchEvent($id, $data = null)
    {
        $this->checkEvent($id);

        $this->eventList[$id]->notify($data);
    }

    protected function checkEvent($id)
    {
        if (!isset($this->eventList[$id])) {
            $this->eventList[$id] = new Event($id);
        }
    }

    public function __set($property, $value)
    {
        $this->addListener($property, $value);
    }

    public function __call($methodName, array $arguments = array())
    {
        foreach ($arguments as $argument) {
            $this->dispatchEvent($methodName, $argument);
        }
    }
}
