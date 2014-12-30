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
    protected $allowableChildren = array();

    /**
     * @param Camel $camel
     * @return $this
     */
    public function setCamel(Camel $camel)
    {
        $this->camel = $camel;

        return $this;
    }

    /**
     * @return array
     */
    public function getAllowableChildren()
    {
        return $this->allowableChildren;
    }

    /**
     * @return string
     */
    abstract public function nodeName();

    /**
     * @throws \LogicException
     * @return Camel
     */
    public function end()
    {
        if (!isset($this->camel))
            throw new \LogicException('Cannot call "end" as the Camel this Hump belongs to is not defined.');

        return $this->camel;
    }

    /**
     * @return string
     */
    abstract public function __toString();
}