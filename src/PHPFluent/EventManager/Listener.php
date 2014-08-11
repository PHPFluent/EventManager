<?php

namespace PHPFluent\EventManager;

interface Listener
{
    public function execute(Event $event, array $params = array());
}
