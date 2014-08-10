<?php
use PHPFluent\EventManager\Event;

/**
 * EventTest test case.
 */
class EventTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider notifierListProvider
     */
    public function testShouldNotify($id, $callable, $expected)
    {
        $event = new Event($id);

        $event->attach($callable);
        ob_start();

        $event->notify();

        $result = ob_get_clean();

        $this->assertEquals($expected, $result);
    }

    public function notifierListProvider()
    {
        return array(
                array('my.event.1', function () {}, null),
                array('my.event.2', function () { echo "a";}, "a"),
        );
    }
}
