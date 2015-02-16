<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PHPFluent\EventManager\Manager;
use PHPFluent\EventManager\Listener\Process;

// Create a process to be executed in background.
// Parameter can be callable or Arara\Process\Action\Action instance.
$process = new Process(function () {
    echo "-process.start: " . date('H:i:s') . PHP_EOL;
    sleep(5);
    echo "-process...end: " . date('H:i:s') . PHP_EOL;
});

$manager = new Manager();
$manager->addEventListener('process', $process);

// dispatch a non-blocking execution
$manager->dispatchEvent('process');

// continue executing
echo '* Script Execution Continued...' . PHP_EOL;
sleep(1.5);
echo '* Script Execution Finished!' . PHP_EOL;
