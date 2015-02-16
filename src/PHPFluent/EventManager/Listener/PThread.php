<?php
namespace PHPFluent\EventManager\Listener;

use PHPFluent\EventManager\Event;

/**
* work with pthreads extension
*/
class PThread extends Asynchronous
{
    /**
    * @var \Thread
    */
    private $thread;

    /**
     * @param \Thread $thread
     */
    public function __construct(\Thread $thread)
    {
        $this->thread = $thread;
    }

    public function getThread()
    {
        return $this->thread;
    }

    /**
     *
     * @return \Thread
     */
    public function execute(Event $event, array $context = array())
    {
        $this->getThread()
             ->start();

        return $this->getThread();
    }
}
