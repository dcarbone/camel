<?php namespace DCarbone\Camel\Part;

use DCarbone\Camel\Camel;

/**
 * Class AbstractPart
 * @package DCarbone\Camel\Part
 */
abstract class AbstractPart
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