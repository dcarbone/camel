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
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public function __construct($type, $value = null, array $attributes = array(), $wrapWithAny = false, $subHumps = array())
    {
        if (!is_string($type) || ($type = trim($type)) === '')
            throw new \InvalidArgumentException(__CLASS__.'::__construct - "$type" parameter must be string');

        if ($value !== null && !is_string($value))
            throw new \RuntimeException(get_class($this).'::__construct - "$value" parameter must be null or string, saw '.gettype($value));

        $this->type = $type;
        $this->value = $value;
        $this->attributes = $attributes;
        $this->wrapWithAny = $wrapWithAny;

        parent::__construct($subHumps);
    }

    /**
     * @param array $data
     * @return \DCarbone\Camel\Parts\IHump
     */
    protected function initNew(array $data = array())
    {
        return new static($this->type, $this->value, $this->attributes, $this->wrapWithAny, $data);
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

        if (count($this) === 0 && (!isset($this->value) || $this->value === ''))
            return $string.' />'.($this->wrapWithAny ? '</any>' : '');

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
}