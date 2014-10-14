<?php namespace DCarbone\Camel\Node;

/**
 * Class XML
 * @package DCarbone\Camel\Node
 */
class XML extends AbstractNode implements IValueNode
{
    /** @var string */
    protected $value = '';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->validParents = array(
            'BeginsWith',
            'Contains',
            'DateRangesOverlap',
            'Eq',
            'Geq',
            'Gt',
            'In',
            'Includes',
            'IsNotNull',
            'IsNull',
            'Leq',
            'Lt',
            'Neq',
            'NotIncludes',
            'Value',
        );
    }

    /**
     * @return string
     */
    public function nodeName()
    {
        return 'XML';
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