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

            return @new \SimpleXMLElement((string)$this, $arg);
        }
        catch (\Exception $e)
        {
            if (libxml_get_last_error() !== false)
                throw new \RuntimeException(get_class($this).'::getAsSXE - "'.libxml_get_last_error()->message.'"');
            else
                throw new \RuntimeException(get_class($this).'::getAsSXE - "'.$e->getMessage().'"');
        }
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
     * @return array
     */
    public function toSoapClientArgumentArray()
    {
        $sxe = $this->getAsSXE();

        $array = array($this->name => array());

        /**
         * @param \SimpleXMLElement $element
         * @param array $array
         */
        $parseXml = function(\SimpleXMLElement $element, array &$array) use ($sxe, &$parseXml) {
            $children = $element->children();
            $attributes = $element->attributes();
            $value = trim((string)$element);

            if (count($children) > 0)
            {
                if ($element->getName() === 'any')
                {
                    $array[$element->getName()] = $children[0]->saveXML();
                }
                else
                {
                    if (!isset($array[$element->getName()]))
                        $array[$element->getName()] = array();

                    foreach($children as $child)
                    {
                        /** @var \SimpleXMLElement $child */
                        $parseXml($child, $array[$element->getName()]);
                    }
                }
            }
            else
            {
                $array[$element->getName()] = $value;
            }
        };

        foreach($sxe->children() as $element)
        {
            /** @var $element \SimpleXMLElement */
            $parseXml($element, $array[$sxe->getName()]);
        }

        return $array;
    }

    /**
     * @param array $data
     * @return \DCarbone\CollectionPlus\ICollectionPlus
     */
    protected function initNew(array $data = array())
    {
        return new static($this->name, $data);
    }
}
