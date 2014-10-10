<?php namespace DCarbone\Camel\Parts;

use DCarbone\CollectionPlus\AbstractCollectionPlus;
use DCarbone\CollectionPlus\BaseCollectionPlus;

/**
 * Class Hump
 * @package DCarbone\Camel\Parts\Humps
 *
 * @property string type
 * @property array attributes
 * @property string value
 * @property bool wrapWithAny
 * @property \SimpleXMLElement sxe
 * @property \DCarbone\CollectionPlus\BaseCollectionPlus subHumps
 */
class Hump implements IHump
{
    /** @var string */
    protected $_type;

    /** @var array */
    protected $_attributes;

    /** @var string */
    protected $_value;

    /** @var bool */
    protected $_wrapWithAny;

    /** @var \DCarbone\CollectionPlus\BaseCollectionPlus */
    protected $_subHumps;

    /**
     * @param string $type
     * @param string $value
     * @param array $attributes
     * @param bool $wrapWithAny
     * @param array $subHumps
     * @return \DCarbone\Camel\Parts\Hump
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public static function init($type, $value = null, $attributes = array(), $wrapWithAny = false, $subHumps = array())
    {
        if (!is_string($type))
            throw new \InvalidArgumentException('Argument 1 must be string, '.gettype($type).' seen.');

        if (($type = trim($type)) === '')
            throw new \RuntimeException('Argument 1 cannot be empty string');

        if ($value !== null && !is_string($value))
            throw new \InvalidArgumentException('Argument 2 must be null or string, '.gettype($value).' seen.');

        if ($attributes !== null && !is_array($attributes))
            throw new \InvalidArgumentException('Argument 3 must be null or array, '.gettype($attributes).' seen.');

        if (!is_bool($wrapWithAny))
            throw new \InvalidArgumentException('Argument 4 must be boolean, '.gettype($wrapWithAny).' seen.');

        if ($subHumps !== null && !is_array($subHumps))
            throw new \InvalidArgumentException('Argument 5 must be null or array, '.gettype($subHumps).' seen.');

        /** @var \DCarbone\Camel\Parts\Hump $hump */
        $hump = new static;

        $hump->_type = $type;

        if (null === $value)
            $hump->_value = '';
        else
            $hump->_value = $value;

        if (null === $attributes)
            $hump->_attributes = array();
        else
            $hump->_attributes = $attributes;

        $hump->_wrapWithAny = $wrapWithAny;

        if (null === $subHumps)
            $hump->_subHumps = new BaseCollectionPlus(array());
        else
            $hump->_subHumps = new BaseCollectionPlus($subHumps);

        return $hump;
    }

    /**
     * @param $param
     * @return array|bool|BaseCollectionPlus|\SimpleXMLElement|string
     * @throws \OutOfBoundsException
     */
    public function __get($param)
    {
        switch($param)
        {
            case 'type':
                return $this->_type;
            case 'attributes':
                return $this->_attributes;
            case 'value':
                return $this->_value;
            case 'wrapWithAny':
                return $this->_wrapWithAny;
            case 'subHumps':
                return $this->_subHumps;
            case 'sxe':
                return $this->getAsSXE();

            default:
                throw new \OutOfBoundsException(get_class($this).' - No property "'.$param.'" exists on this class.');
        }
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->_value;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->_attributes;
    }

    /**
     * @param bool $v
     * @return IHump
     */
    public function wrapWithAny($v = true)
    {
        $this->_wrapWithAny = (bool)$v;
        return $this;
    }

    /**
     * @throws \RuntimeException
     * @return \SimpleXMLElement
     */
    public function getAsSXE()
    {
        try {
            if (defined('LIBXML_PARSEHUGE'))
                $arg = LIBXML_COMPACT | LIBXML_NOBLANKS | LIBXML_PARSEHUGE;
            else
                $arg = LIBXML_COMPACT | LIBXML_NOBLANKS;

            $strVal = (string)$this;
            $sxe = new \SimpleXMLElement($strVal, $arg);

            return $sxe;
        }
        catch (\Exception $e)
        {
            if (libxml_get_last_error() !== false)
                throw new \RuntimeException(get_class($this).'::getAsSXE - "'.libxml_get_last_error()->message.'"', $e->getCode(), $e);
            else
                throw new \RuntimeException(get_class($this).'::getAsSXE - "'.$e->getMessage().'"', $e->getCode(), $e);
        }
    }

    /**
     * @param \DCarbone\Camel\Parts\IHump $hump
     * @return IHump
     */
    public function addSubHump(IHump $hump)
    {
        $this->_subHumps->append($hump);
        return $this;
    }

    /**
     * @param \DCarbone\Camel\Parts\IHump|string $hump
     * @return IHump
     */
    public function removeSubHump($hump)
    {
        if (is_string($hump))
        {
            foreach($this->_subHumps as $h)
            {
                /** @var \DCarbone\Camel\Parts\IHump $h */
                if ($h->getType() === $hump)
                {
                    $hump = $h;
                    break;
                }
            }
        }

        if ($hump instanceof Hump)
            $this->_subHumps->removeElement($hump);

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        // Build opening tag
        if ($this->_wrapWithAny)
            $string = '<any>';
        else
            $string = '';

        $string .= '<'.$this->_type;

        foreach($this->_attributes as $attName=>$attValue)
            $string .= ' '.$attName.'="'.$attValue.'"';

        // If this element has no value AND no children
        if (count($this->_subHumps) === 0 && (!isset($this->_value) || $this->_value === ''))
        {
            $string .= ' />';
            if ($this->_wrapWithAny)
                $string .= '</any>';

            return $string;
        }


        $string .= '>';

        // Add child elements
        if (count($this->_subHumps) > 0)
        {
            foreach($this->_subHumps as $subHump)
            {
                $subHumpString = (string)$subHump;
                $string .= $subHumpString;
            }
        }

        // Add element value
        $string .= (string)$this->_value;

        // Close and return XML string
        return $string.'</'.$this->_type.'>'.($this->_wrapWithAny ? '</any>' : '');
    }
}