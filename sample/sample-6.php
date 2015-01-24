<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PHPFluent\EventManager\Manager;
use PHPFluent\EventManager\Listener\PThread;

class MyThread extends \Thread
{
    public function run()
    {
        echo "-thread.start: " . date('H:i:s') . PHP_EOL;
        sleep(5);
        echo "-thread...end: " . date('H:i:s') . PHP_EOL;
    }
}

$manager = new Manager();
$manager->thread = new PThread(new MyThread());

$manager->thread();

echo '* Script Execution Continued...' . PHP_EOL;
//sleep(2);
echo '* Script Execution Finished!' . PHP_EOL;
