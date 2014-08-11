<?php

namespace PHPFluent\EventManager;

use ReflectionFunction;
use ReflectionParameter;

class ListenerCallback implements Listener
{
    protected $reflection;

    public function __construct(callable $callback)
    {
        $this->reflection = new ReflectionFunction($callback);
    }

    public function execute(Event $event, array $params = array())
    {
        $arguments = array($event, $params);
        $parameters = $this->reflection->getParameters();
        $firstParameter = array_shift($parameters);
        if ($firstParameter instanceof ReflectionParameter
            && $firstParameter->isArray()) {
            $arguments = array_reverse($arguments);
        }

        return $this->reflection->invokeArgs($arguments);
    }
}
