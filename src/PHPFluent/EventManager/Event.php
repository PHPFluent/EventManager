<?php

namespace PHPFluent\EventManager;

class Event
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var \PHPFluent\EventManager\Listener\Collection
     */
    protected $listenerList;

    /**
     * @var bool
     */
    protected $propagationStopped = false;

    /**
     * Constructor
     *
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name         = $name;
        $this->listenerList = new Listener\Collection();
    }

    /**
     * Get the Event name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the Listener collection
     *
     * @return \PHPFluent\EventManager\Listener\Collection
     */
    public function getListeners()
    {
        return $this->listenerList;
    }

    public function stopPropagation()
    {
        $this->propagationStopped = true;
    }

    /**
     * Check if propagation is stopped
     *
     * @return bool
     */
    public function isPropagationStopped()
    {
        return $this->propagationStopped;
    }
}
