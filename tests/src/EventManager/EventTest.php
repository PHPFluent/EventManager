<?php

namespace PHPFluent\EventManager;

/**
 * @covers PHPFluent\EventManager\Event
 */
class EventTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldDefineNameOnConstructor()
    {
        $name  = 'someName';
        $event = new Event($name);

        $this->assertSame($name, $event->getName());
    }

    public function testShouldReturnListenerCollection()
    {
        $event = new Event('whatever');

        $this->assertInstanceOf('PHPFluent\EventManager\ListenerCollection', $event->getListeners());
    }

    public function testShouldNotStoppedPropagationByDefault()
    {
        $event = new Event('whatever');

        $this->assertFalse($event->isPropagationStopped());
    }

    public function testShouldBeAbleToStoppedPropagation()
    {
        $event = new Event('whatever');

        $event->stopPropagation();

        $this->assertTrue($event->isPropagationStopped());
    }
}
