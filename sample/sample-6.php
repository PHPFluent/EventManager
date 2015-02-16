<?php

if (! extension_loaded('pthreads')) {
    echo "!! Need the pthreads extension !!" . PHP_EOL;
    exit(1);
}

require_once __DIR__ . '/../vendor/autoload.php';

use PHPFluent\EventManager\Manager;
use PHPFluent\EventManager\Listener\PThread;

/**
 * Personalized Thread class
 * @see http://php.net/pthreads
 * @see http://php.net/class.thread
 */
class MyThread extends \Thread
{
    /**
     * the script process to run in background
     */
    public function run()
    {
        echo "-thread.start: " . date('H:i:s') . PHP_EOL;
        sleep(5);
        echo "-thread...end: " . date('H:i:s') . PHP_EOL;
    }
}

// create the listener
$listener = new PThread(
    new MyThread() // with MyThread
);

$manager = new Manager();
$manager->addEventListener('thread', $listener);
// dispatch listener in background.
$manager->dispatchEvent('thread');

//continue executing
echo '* Script Execution Continued...' . PHP_EOL;
//sleep(2);
echo '* Script Execution Finished!' . PHP_EOL;
