<?php namespace DCarbone\Camel\Parts;

/**
 * Interface IHump
 * @package DCarbone\Camel\Parts\Humps
 */
interface IHump
{
    /**
     * @return string
     */
    public function getType();

    /**
     * @return array
     */
    public function getAttributes();

    /**
     * @return string
     */
    public function getValue();

    /**
     * @param bool $v
     * @return IHump
     */
    public function wrapWithAny($v = true);

    /**
     * @return \SimpleXMLElement
     */
    public function getAsSXE();

    /**
     * @param \DCarbone\Camel\Parts\Hump|\DCarbone\Camel\Parts\IHump $hump
     * @return IHump
     */
    public function addSubHump(IHump $hump);

    /**
     * @param $hump
     * @return \DCarbone\Camel\Parts\Hump
     */
    public function removeSubHump($hump);

    /**
     * @return string
     */
    public function __toString();
}