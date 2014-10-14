<?php namespace DCarbone\Camel\Node;

/**
 * Interface IValueNode
 * @package DCarbone\Camel\Node
 */
interface IValueNode
{
    /**
     * Set text value on this node
     *
     * @param string $value
     * @return $this
     */
    public function setNodeTextValue($value);

    /**
     * @return string
     */
    public function getNodeTextValue();
}