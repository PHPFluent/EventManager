<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PHPFluent\EventManager\Manager;
use PHPFluent\EventManager\Listener\Process;

$manager = new Manager();
$manager->process = new Process(function () {
    echo "-process.start: " . date('H:i:s') . PHP_EOL;
    sleep(5);
    echo "-process...end: " . date('H:i:s') . PHP_EOL;
});

$manager->process();

echo '* Script Execution Continued...' . PHP_EOL;
sleep(1.5);
echo '* Script Execution Finished!' . PHP_EOL;
