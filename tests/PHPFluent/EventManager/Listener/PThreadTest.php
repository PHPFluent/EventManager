<?php

namespace PHPFluent\EventManager\Listener;

use PHPFluent\EventManager\Event;

/**
* @covers PHPFluent\EventManager\Listener\PThread
*/
class PThreadTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructorShouldDefineThread()
    {
        $thread   = $this->getMock('\Thread');
        $listener = new PThread($thread);

        $this->assertAttributeEquals($thread, 'thread', $listener);
    }

    public function testGetThread()
    {
        $thread   = $this->getMock('\Thread');
        $listener = new PThread($thread);

        $this->assertSame($thread, $listener->getThread());
    }

    public function testExecuteShouldReturnThread()
    {
        $thread = $this->getMock('\Thread', array('start'));
        $thread->expects($this->once())
               ->method('start');

        $listener = new PThread($thread);
        $this->assertInstanceOf('\Thread', $listener->execute(new Event('')));
    }
}
