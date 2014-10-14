<?php namespace DCarbone\Camel\Node;

/**
 * Class Month
 * @package DCarbone\Camel\Node
 */
class Month extends AbstractNode implements IValueNode
{
    /** @var string */
    protected $value = '';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->validParents = array('Value');
    }

    /**
     * @return string
     */
    public function nodeName()
    {
        return 'Month';
    }

    /**
     * Set text value on this node
     *
     * @param string $value
     * @return $this
     */
    public function setNodeTextValue($value)
    {
        $this->value = (string)$value;

        return $this;
    }

    /**
     * @return string
     */
    public function getNodeTextValue()
    {
        return $this->value;
    }
}