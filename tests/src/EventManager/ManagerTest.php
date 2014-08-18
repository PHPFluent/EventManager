<?php

namespace PHPFluent\EventManager;

/**
 * @covers PHPFluent\EventManager\Manager
 */
class ManagerTest extends \PHPUnit_Framework_TestCase
{

    public function testShouldTriggerEvent()
    {
        $manager  = new Manager();
        $event    = $manager->getEvent('foo');
        $params   = array(1, 2, 3);
        $listener = $this->getMock('PHPFluent\EventManager\Listener');

        $listener
            ->expects($this->once())
            ->method('execute')
            ->with($event, $params);

        $manager->addEventListener($event->getName(), $listener);
        $manager->dispatchEvent($event->getName(), $params);
    }

    public function testShouldNotTriggerEventWhenPropagationIsStopped()
    {
        $manager  = new Manager();
        $event    = $manager->getEvent('foo');
        $params   = array(1, 2, 3);
        $listener = $this->getMock('PHPFluent\EventManager\Listener');

        $listener
            ->expects($this->never())
            ->method('execute')
            ->with($event, $params);

        $manager->addEventListener('foo', function (Event $event) {
            $event->stopPropagation();
        });

        $manager->addEventListener($event->getName(), $listener);
        $manager->dispatchEvent($event->getName(), $params);
    }

    public function testShouldDispatchEventsWhenListenerIsACallback()
    {
        $callback = function (array $params) {
            echo "Hello, {$params['name']}!";
        };

        $this->expectOutputString('Hello, John Doe!');

        $manager = new Manager();

        $manager->addEventListener('foo', $callback);
        $manager->dispatchEvent('foo', array('name' => 'John Doe'));
    }

    public function testShouldHandleEventUsingMagicMethods()
    {
        $callback1 = function () {
            echo 'Hello';
        };

        $callback2 = function () {
            echo ' guys!';
        };

        $this->expectOutputString('Hello guys!');

        $manager = new Manager();

        $manager->foo = $callback1;
        $manager->foo = $callback2;

        $manager->foo();
    }

    public function testShouldDispatchEventWithArgumentUsingMagicMethods()
    {
        $callback = function (array $params) {
            echo json_encode($params);
        };

        $this->expectOutputString('[1,2]');

        $manager = new Manager();

        $manager->foo = $callback;

        $manager->foo(array(1, 2));
    }
}
