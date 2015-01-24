<?php

namespace PHPFluent\EventManager\Listener;

use ReflectionFunction;

/**
 * @covers PHPFluent\EventManager\Listener\Collection
 */
class CollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldAddListenerToCollection()
    {
        $listener   = $this->getMock('PHPFluent\EventManager\Listener');
        $collection = new Collection();

        $collection->add($listener);

        $this->assertCount(1, $collection);
    }

    public function testShouldBeIterable()
    {
        $collection = new Collection();

        $collection->add($this->getMock('PHPFluent\EventManager\Listener'));

        foreach ($collection as $listener) {
            $this->assertInstanceOf('PHPFluent\EventManager\Listener', $listener);
        }
    }
}
