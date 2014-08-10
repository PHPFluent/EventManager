<?php

namespace PHPFluent\EventManager;

class Event implements Eventable
{
    protected $id;

    protected $callableList;

    public function __construct($id)
    {
        $this->id           = $id;
        $this->callableList = new \SplObjectStorage;
    }

    public function attach(callable $callable)
    {
        $this->callableList[$callable] = $callable;
    }

    public function notify($data = null)
    {
        foreach ($this->callableList as $callable) {
            call_user_func_array($callable, func_get_args());
        }
    }
}
