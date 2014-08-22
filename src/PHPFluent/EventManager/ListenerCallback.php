<?php

namespace PHPFluent\EventManager;

class ListenerCallback implements Listener
{
    /**
     * @var \ReflectionFunction
     */
    protected $reflection;

    /**
     * Constructor
     *
     * @param callable $callback
     */
    public function __construct(callable $callback)
    {
        $this->reflection = new \ReflectionFunction($callback);
    }

    /**
     * (non-PHPdoc)
     * @see \PHPFluent\EventManager\Listener::execute()
     */
    public function execute(Event $event, array $context = array())
    {
        $arguments      = array($event, $context);
        $parameters     = $this->reflection->getParameters();
        $firstParameter = array_shift($parameters);

        if ($firstParameter instanceof \ReflectionParameter
                && $firstParameter->isArray()) {
            $arguments = array_reverse($arguments);
        }

        return $this->reflection->invokeArgs($arguments);
    }
}
