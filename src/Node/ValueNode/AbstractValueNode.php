<?php namespace DCarbone\Camel\Node\ValueNode;

use DCarbone\Camel\Node\AbstractNode;
use DCarbone\Camel\Node\IValueNode;

/**
 * Class AbstractValueNode
 * @package DCarbone\Camel\Node\ValueNode
 */
abstract class AbstractValueNode extends AbstractNode implements IValueNode
{
    /** @var string */
    protected $nodeValue;

    /**
     * @param string $value
     * @return $this
     */
    public function nodeValue($value)
    {
        $this->nodeValue = (string)$value;

        return $this;
    }

    /**
     * @return $this
     */
    public function getNodeValue()
    {
        return $this->nodeValue;
    }
}