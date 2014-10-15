<?php namespace DCarbone\Camel\Hump;

use DCarbone\Camel\Camel;

/**
 * Class AbstractHump
 * @package DCarbone\Camel\Hump
 */
abstract class AbstractHump
{
    /** @var \DCarbone\Camel\Camel */
    protected $camel;

    /** @var array */
    protected $validChildren = array();

    /**
     * @param Camel $camel
     */
    public function __construct(Camel $camel)
    {
        $this->camel = $camel;
    }

    /**
     * @return array
     */
    public function getValidChildren()
    {
        return $this->validChildren;
    }

    /**
     * @return string
     */
    abstract public function nodeName();

    /**
     * @return Camel
     */
    public function end()
    {
        return $this->camel;
    }

    /**
     * @return string
     */
    abstract public function __toString();
}