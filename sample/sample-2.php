<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PHPFluent\EventManager\Event;
use PHPFluent\EventManager\Manager;

$eventManager = new Manager();

// Use no argument
$eventManager->addEventListener('foo', function () {
    echo 'Listener 1' . PHP_EOL;
});

// Use `Event` as first argument
$eventManager->addEventListener('foo', function (Event $event) {
    echo 'Listener 2: ' . $event->getName() . PHP_EOL;
});

// Use `Event` as first argument and an array as seccond
$eventManager->addEventListener('foo', function (Event $event, array $params) {
    echo 'Listener 3: ' . $event->getName() . ', ' . json_encode($params) . PHP_EOL;
});

// Use an array as first argument
$eventManager->addEventListener('foo', function (array $params) {
    echo 'Listener 4: ' . json_encode($params) . PHP_EOL;
});

// Use an array as first argument and `Event` as seccond
$eventManager->addEventListener('foo', function (array $params, Event $event) {
    echo 'Listener 3: ' . json_encode($params) . ', ' . $event->getName() . PHP_EOL;
});

// Dispatch event
$eventManager->dispatchEvent('foo', range(1, 10));
