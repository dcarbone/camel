<?php namespace DCarbone\Camel\Parts;

use DCarbone\CollectionPlus\AbstractCollectionPlus;

/**
 * Class Hump
 * @package DCarbone\Camel\Parts\Humps
 */
class Hump extends AbstractCollectionPlus implements IHump
{
    /** @var string */
    protected $type;

    /** @var array */
    protected $attributes;

    /** @var string */
    protected $value;

    /** @var bool */
    private $wrapWithAny;

    /**
     * @param string $type
     * @param string $value
     * @param array $attributes
     * @param bool $wrapWithAny
     * @param array $subHumps
     * @throws \InvalidArgumentException
     */
    public function __construct($type, $value = '', array $attributes = array(), $wrapWithAny = false, $subHumps = array())
    {
        if (!is_string($type) || ($type = trim($type)) === '')
            throw new \InvalidArgumentException(__CLASS__.'::__construct - "$type" parameter must be string');

        $this->type = $type;
        $this->value = $value;
        $this->attributes = $attributes;
        $this->wrapWithAny = $wrapWithAny;

        parent::__construct($subHumps);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param bool $v
     * @return IHump
     */
    public function wrapWithAny($v = true)
    {
        $this->wrapWithAny = (bool)$v;
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
     * @param \DCarbone\Camel\Parts\IHump $hump
     * @return IHump
     */
    public function addSubHump(IHump $hump)
    {
        $this->append($hump);
        return $this;
    }

    /**
     * @param \DCarbone\Camel\Parts\IHump|string $hump
     * @return IHump
     */
    public function removeSubHump($hump)
    {
        $idx = -1;
        if ($hump instanceof Hump)
        {
            $idx = $this->indexOf($hump);
        }
        else if (is_string($hump))
        {
            foreach($this as $idx=>$h)
            {
                /** @var \DCarbone\Camel\Parts\Hump $h */
                if ($h->getType() === $hump)
                    break;
            }
        }

        if ($idx >= 0)
            unset($this[$idx]);

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        // Build opening tag
        if ($this->wrapWithAny === true)
            $string = '<any>';
        else
            $string = '';

        $string .= '<'.$this->type;

        foreach($this->attributes as $attName=>$attValue)
            $string .= ' '.$attName.'="'.$attValue.'"';
        $string .= '>';

        // Add child elements
        if (count($this) > 0)
            foreach($this as $subHump)
                $string .= (string)$subHump;

        // Add element value
        $string .= (string)$this->value;

        // Close and return XML string
        return $string.'</'.$this->type.'>'.($this->wrapWithAny ? '</any>' : '');
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

        return new static($this->type, $this->value, $this->attributes, $this->wrapWithAny, array_map($func, $this->__toArray()));
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
            return new static($this->type, $this->value, $this->attributes, $this->wrapWithAny, array_filter($this->__toArray()));

        if (strpos($callable_name, 'Closure::') !== 0)
            $func = $callable_name;

        return new static($this->type, $this->value, $this->attributes, $this->wrapWithAny, array_filter($this->__toArray(), $func));
    }
}