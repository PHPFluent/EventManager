<?php

namespace PHPFluent\EventManager\Listener;

use PHPFluent\EventManager\Exception;
use InvalidArgumentException;

class InvalidException extends InvalidArgumentException implements Exception
{
}
