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

        $parameters = array_slice(func_get_args(), 1);

        call_user_func_array(
            array($this->eventList[$id], 'notify'),
            $parameters
        );
    }

    protected function checkEvent($id)
    {
        if (!isset($this->eventList[$id])) {
            $this->eventList[$id] = new Event($id);
        }
    }
}
