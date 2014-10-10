<?php namespace DCarbone\Camel;

use DCarbone\Camel\Parts\Hump;
use DCarbone\Camel\Parts\IHump;
use DCarbone\CollectionPlus\AbstractCollectionPlus;
use DCarbone\CollectionPlus\BaseCollectionPlus;

/**
 * Class Camel
 * @package DCarbone\Camel
 *
 * @property string name
 * @property \SimpleXMLElement sxe
 * @property \DCarbone\CollectionPlus\BaseCollectionPlus humps
 */
class Camel
{
    /** @var string */
    protected $_name;

    /** @var \DCarbone\CollectionPlus\BaseCollectionPlus */
    protected $_humps;

    /**
     * @param string $name
     * @param null|array|\DCarbone\CollectionPlus\BaseCollectionPlus $humps
     * @return \DCarbone\Camel\Camel
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public static function init($name, $humps = null)
    {
        if (!is_string($name))
            throw new \InvalidArgumentException('Argument 1 must be string, '.gettype($name).' seen.');

        if (($name = trim($name)) === '')
            throw new \RuntimeException('Argument 1 cannot be empty string.');

        /** @var \DCarbone\Camel\Camel $camel */
        $camel = new static;

        $camel->_name = $name;

        if (is_array($humps))
            $camel->_humps = new BaseCollectionPlus($humps);
        else if ($humps instanceof BaseCollectionPlus)
            $camel->_humps = $humps;
        else if (null === $humps)
            $camel->_humps = new BaseCollectionPlus();
        else
            throw new \InvalidArgumentException('Argument 2 expected to be array, instance of \\DCarbone\\CollectionPlus\\BaseCollectionPlus, or null.  '.gettype($humps).' seen.');

        return $camel;
    }

    /**
     * @param string $param
     * @return BaseCollectionPlus|\SimpleXMLElement|string
     * @throws \OutOfBoundsException
     */
    public function __get($param)
    {
        switch($param)
        {
            case 'name':
                return $this->_name;
            case 'humps':
                return $this->_humps;
            case 'sxe':
                return $this->getAsSXE();

            default:
                throw new \OutOfBoundsException(get_class($this).' - No property "'.$param.'" exists on this class.');
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param IHump $hump
     * @return $this
     */
    public function addHump(IHump $hump)
    {
        $this->_humps->append($hump);
        return $this;
    }

    /**
     * @param \DCarbone\Camel\Parts\IHump|string $hump
     * @return $this
     */
    public function removeHump($hump)
    {
        if (is_string($hump))
        {
            $this->_humps->rewind();
            while($this->_humps->valid())
            {
                /** @var \DCarbone\Camel\Parts\IHump $h */
                $h = $this->_humps->current();

                if ($h->getType() === $hump)
                {
                    $hump = $h;
                    break;
                }

                $this->_humps->next();
            }
            $this->_humps->rewind();
        }

        if ($hump instanceof Hump)
            $this->_humps->removeElement($hump);

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
     * @return string
     */
    public function __toString()
    {
        $return = '<'.$this->_name.
            ' xmlns="http://schemas.microsoft.com/sharepoint/soap/">';

        foreach($this->_humps as $hump)
        {
            $humpVal = (string)$hump;
            $return .= $humpVal;
        }

        return $return.'</'.$this->_name.'>';
    }

    /**
     * @return array
     */
    public function __toArray()
    {
        return $this->toSoapClientArgumentArray();
    }

    /**
     * @return array
     */
    public function toSoapClientArgumentArray()
    {
        $sxe = $this->getAsSXE();
        $array = array($this->_name => array());

        foreach($sxe->children() as $element)
        {
            /** @var $element \SimpleXMLElement */
            $this->parseXML($element, $array[$this->_name]);
        }

        $sxe = null;
        unset($sxe);

        return $array;
    }

    /**
     * @param \SimpleXMLElement $element
     * @param array $array
     */
    protected function parseXML(\SimpleXMLElement $element, array &$array)
    {
        /** @var array $children */
        $children = $element->children();
//        $attributes = $element->attributes();
        $elementValue = trim((string)$element);
        $elementName = $element->getName();

        if (count($children) > 0)
        {
            if ($elementName === 'any')
            {
                /** @var \SimpleXMLElement $child */
                $child = $children[0];
                $array[$elementName] = $child->saveXML();
            }
            else
            {
                if (!isset($array[$elementName]))
                    $array[$elementName] = array();

                foreach($children as $child)
                {
                    /** @var \SimpleXMLElement $child */
                    $this->parseXML($child, $array[$elementName]);
                }
            }
        }
        else
        {
            $array[$elementName] = $elementValue;
        }
    }
}
