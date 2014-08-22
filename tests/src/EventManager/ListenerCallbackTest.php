<?php

namespace PHPFluent\EventManager;

use ReflectionFunction;

/**
 * @covers PHPFluent\EventManager\ListenerCallback
 */
class ListenerCallbackTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldDefineCallbackOnConstructor()
    {
        $callback   = function () {};
        $reflection = new ReflectionFunction($callback);
        $listener   = new ListenerCallback($callback);

        $this->assertAttributeEquals($reflection, 'reflection', $listener);
    }

    public function testShouldRunDefinedCallback()
    {
        $callback = function () {
            return 'Whatever';
        };

        $reflection     = new ReflectionFunction($callback);
        $listener       = new ListenerCallback($callback);
        $event          = new Event('name');
        $result         = $listener->execute($event);
        $expectedResult = 'Whatever';

        $this->assertEquals($expectedResult, $result);
    }

    public function testShouldRunDefinedCallbackWhenItUsesEventAsFirstArgument()
    {
        $callback = function (Event $event) {
            return get_class($event);
        };

        $reflection     = new ReflectionFunction($callback);
        $listener       = new ListenerCallback($callback);
        $event          = new Event('name');
        $result         = $listener->execute($event, range(1, 3));
        $expectedResult = __NAMESPACE__ . '\\Event';

        $this->assertEquals($expectedResult, $result);
    }

    public function testShouldRunDefinedCallbackWhenItUsesEventAsFirstArgumentAndParamsAsSecondArgument()
    {
        $callback = function (Event $event, array $params = array()) {
            return json_encode(func_get_args());
        };

        $reflection     = new ReflectionFunction($callback);
        $listener       = new ListenerCallback($callback);
        $event          = new Event('name');
        $result         = $listener->execute($event, range(1, 3));
        $expectedResult = '[{},[1,2,3]]';

        $this->assertEquals($expectedResult, $result);
    }

    public function testShouldRunDefinedCallbackWhenItUsesArrayAsFirstArgument()
    {
        $callback = function (array $params = array()) {
            return json_encode($params);
        };

        $reflection     = new ReflectionFunction($callback);
        $listener       = new ListenerCallback($callback);
        $event          = new Event('name');
        $result         = $listener->execute($event, range(1, 3));
        $expectedResult = '[1,2,3]';

        $this->assertEquals($expectedResult, $result);
    }
}

