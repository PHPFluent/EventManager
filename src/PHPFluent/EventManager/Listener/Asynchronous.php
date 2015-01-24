<?php

namespace PHPFluent\EventManager\Listener;

use PHPFluent\EventManager\Listener;
use PHPFluent\EventManager\Event;

abstract class Asynchronous implements Listener
{
    /**
     * @see \PHPFluent\EventManager\Listener::execute()
     */
    abstract public function execute(Event $event, array $context = array());
}
