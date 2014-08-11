<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PHPFluent\EventManager\Event;
use PHPFluent\EventManager\Manager;

$eventManager = new Manager();


$eventManager->addEventListener('bar', function (Event $event) {
    echo 'I will stop event propagation! >:(' . PHP_EOL;
    $event->stopPropagation();
});

$eventManager->addEventListener('bar', function (Event $event) {
    echo 'I will not be executed :(' . PHP_EOL;
});

// Dispatch event
$eventManager->dispatchEvent('bar');
