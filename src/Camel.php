<?php namespace DCarbone\Camel;

use DCarbone\Camel\Parts\Hump;
use DCarbone\Camel\Parts\IHump;
use DCarbone\CollectionPlus\AbstractCollectionPlus;

/**
 * Class Camel
 * @package DCarbone\Camel
 */
class Camel extends AbstractCollectionPlus
{
    /** @var string */
    protected $name;

    /**
     * @param string $name
     * @param array $data
     * @throws \InvalidArgumentException
     */
    public function __construct($name, array $data = array())
    {
        if (!is_string($name) || ($name = trim($name)) === '')
            throw new \InvalidArgumentException(__CLASS__.'::__construct - You must name your camel with a string');

        $this->name = $name;
        parent::__construct($data);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $type
     * @param string $value
     * @param array $attributes
     * @param bool $wrapWithAny
     * @return IHump
     */
    public function newHump($type, $value = '', array $attributes = array(), $wrapWithAny = false)
    {
        return new Hump($type, $value, $attributes, $wrapWithAny);
    }

    /**
     * @param IHump $hump
     * @return $this
     */
    public function addHump(IHump $hump)
    {
        $this->append($hump);
        return $this;
    }

    /**
     * @param \DCarbone\Camel\Parts\IHump|string $hump
     * @return $this
     */
    public function removeHump($hump)
    {
        foreach($this as $h)
        {
            /** @var \DCarbone\Camel\Parts\IHump $h */
            if ($h->getType() === $hump)
            {
                $hump = $h;
                break;
            }
        }

        if ($hump instanceof Hump)
            $this->removeElement($hump);

        return $this;
    }

    /**
     * @return \SimpleXMLElement
     */
    public function getAsSXE()
    {
        return new \SimpleXMLElement((string)$this);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $return = '<'.$this->name.
            ' xmlns="http://schemas.microsoft.com/sharepoint/soap/">';

        foreach($this as $hump)
            $return .= (string)$hump;

        return $return.'</'.$this->name.'>';
    }

    /**
     * Applies array_map to this dataset, and returns a new object.
     *
     * @link http://us1.php.net/array_map
     *
     * They scope "static" is used so that an instance of the extended class is returned.
     *
     * @param callable $func
     * @throws \InvalidArgumentException
     * @return static
     */
    public function map($func)
    {
        if (!is_callable($func, false, $callable_name))
            throw new \InvalidArgumentException(__CLASS__.'::map - Un-callable "$func" value seen!');

        if (strpos($callable_name, 'Closure::') !== 0)
            $func = $callable_name;

        return new static($this->name, array_map($func, $this->__toArray()));
    }

    /**
     * Applies array_filter to internal dataset, returns new instance with resulting values.
     *
     * @link http://www.php.net/manual/en/function.array-filter.php
     *
     * Inspired by:
     *
     * @link http://www.doctrine-project.org/api/common/2.3/source-class-Doctrine.Common.Collections.ArrayCollection.html#377-387
     *
     * @param callable $func
     * @throws \InvalidArgumentException
     * @return static
     */
    public function filter($func = null)
    {
        if ($func !== null && !is_callable($func, false, $callable_name))
            throw new \InvalidArgumentException(__CLASS__.'::filter - Un-callable "$func" value seen!');

        if ($func === null)
            return new static(array_filter($this->__toArray()));

        if (strpos($callable_name, 'Closure::') !== 0)
            $func = $callable_name;

        return new static($this->name, array_filter($this->__toArray(), $func));
    }
}
