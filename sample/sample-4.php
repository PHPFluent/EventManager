<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PHPFluent\EventManager\Event;
use PHPFluent\EventManager\Listener;
use PHPFluent\EventManager\Manager;

class MyListener implements Listener
{

    public function execute(Event $event, array $params = array())
    {
        echo 'For event "' . $event->getName() . '" I will display the params:' . PHP_EOL;
        echo json_encode($params) . PHP_EOL;
    }

}

$eventManager = new Manager();
$eventManager->addEventListener('bar', new MyListener());
$eventManager->dispatchEvent(
    'bar',
    array(
        'Henrique Moody',
        'Kinn Coelho',
    )
);
