<?php namespace DCarbone\Camel\Node;

/**
 * Interface IValueNode
 * @package DCarbone\Camel\Node
 */
interface IValueNode
{
    /**
     * @param string $value
     * @return $this
     */
    public function nodeValue($value);

    /**
     * @return string
     */
    public function getNodeValue();
}