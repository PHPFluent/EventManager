<?php
use PHPFluent\EventManager\Manager;

/**
 * Manager test case.
 */
class ManagerTest extends PHPUnit_Framework_TestCase
{

    /**
     *
     * @var Manager
     */
    private $manager;

    /**
     * Prepares the environment before running a test.
     */
    public function setUp()
    {
        parent::setUp();

        $this->manager = new Manager;
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->manager = null;

        parent::tearDown();
    }

    /**
     * @dataProvider eventProvider
     */
    public function testDispatchEvent($id, $callable, $expected)
    {
        ob_start();

        $this->manager->addListener($id, $callable);
        $this->manager->dispatchEvent($id);

        $result = ob_get_clean();

        $this->assertEquals($expected, $result);
    }

    public function testDispatchEventWithVariousParameters()
    {
        $func = function ($p1, $p2, $p3) {
            echo $p3, $p2, $p1;
        };

        $params = array(1,2,3);
        $expected = implode('', array_reverse($params));

        ob_start();

        $this->manager->addListener('event', $func);
        $this->manager->dispatchEvent('event', $params[0], $params[1], $params[2]);

        $result = ob_get_clean();

        $this->assertEquals($expected, $result);
    }

    public function eventProvider()
    {
        return array(
            array("my.event.1", function(){ echo "a";}, "a"),
            array("my.event.1", function(){ echo "b";}, "b"),
        );
    }
}
