<?php

namespace PHPFluent\EventManager;

interface Eventable
{
    public function attach(callable $callable);

    public function notify($data);
}