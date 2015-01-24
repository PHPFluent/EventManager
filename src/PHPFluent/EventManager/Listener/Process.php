<?php

namespace PHPFluent\EventManager\Listener;

use PHPFluent\EventManager\Event;
use Arara\Process\Child;
use Arara\Process\Control;
use Arara\Process\Action\Action;
use Arara\Process\Action\Callback as ProcessCallback;

class Process extends Asynchronous
{
    /**
     * @var \Arara\Process\Action\Action
     */
    private $action;

    /**
     * Constructor
     * @param \Arara\Process\Action\Action|callable $action
     * @throws \UnexpectedValueException
     */
    public function __construct($action)
    {
        if (! (is_callable($action) || $action instanceof Action)) {
            throw new \UnexpectedValueException(
                '$action must be callable or instance of Arara\Process\Action\Action'
            );
        }

        if (is_callable($action)) {
            $action = new ProcessCallback($action);
        }

        $this->action = $action;
    }

    /**
     * @see PHPFluent\EventManager\Listener::execute()
     */
    public function execute(Event $event, array $context = array())
    {
        $child = new Child($this->action, new Control());
        $child->start();

        return $child;
    }
}
