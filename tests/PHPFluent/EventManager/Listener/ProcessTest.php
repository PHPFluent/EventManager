<?php

namespace PHPFluent\EventManager\Listener;

use PHPFluent\EventManager\Event;
use Arara\Process\Control;
use Arara\Process\Child;

/**
* @covers PHPFluent\EventManager\Listener\Process
*/
class ProcessTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructorShouldConvertCallbackToAction()
    {
        $listener = new Process(function () {});

        $this->assertAttributeInstanceOf('Arara\Process\Action\Action', 'action', $listener);
    }

    public function testConstructorShouldAcceptAction()
    {
        $action   = $this->getMock('Arara\Process\Action\Action');
        $listener = new Process($action);

        $this->assertAttributeSame($action, 'action', $listener);
    }

    /**
     * @expectedException \PHPFluent\EventManager\Exception
     * @expectedExceptionMessage Action must be callable or instance of Arara\Process\Action\Action
     */
    public function testContructorWithNonCallableOrActionInstance()
    {
        new Process("something");
    }

    public function testExecuteShouldReturnChild()
    {
        $action   = $this->getMock('Arara\Process\Action\Action');
        $listener = new Process($action);

        $this->assertInstanceOf('Arara\Process\Child', $listener->execute(new Event('')));
    }
}
