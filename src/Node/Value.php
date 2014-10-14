<?php namespace DCarbone\Camel\Node;

/**
 * Class Value
 * @package DCarbone\Camel\Node
 */
class Value extends AbstractParentNode implements IValueNode
{
    /** @var string */
    protected $value = '';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->validChildren = array(
            'ListProperty',
            'Month',
            'Now',
            'Today',
            'UserID',
            'XML',
        );

        $this->validParents = array(
            'BeginsWith',
            'Contains',
            'DateRangesOverlap',
            'Eq',
            'Geq',
            'Gt',
            'Includes',
            'IsNotNull',
            'Leq',
            'Lt',
            'Neq',
            'NotIncludes',
            'Values',
        );

        $this->validAttributeMap = array(
            'type' => 'Type',
            'includetimevalue' => 'IncludeTimeValue',
        );
    }

    /**
     * @return ListProperty
     */
    public function listProperty()
    {
        $node = new ListProperty();
        $this->append($node);

        return end($this->children);
    }

    /**
     * @return Month
     */
    public function month()
    {
        $node = new Month();
        $this->append($node);

        return end($this->children);
    }

    /**
     * @return Now
     */
    public function now()
    {
        $node = new Now();
        $this->append($node);

        return end($this->children);
    }

    /**
     * @return Today
     */
    public function today()
    {
        $node = new Today();
        $this->append($node);

        return end($this->children);
    }

    /**
     * @return UserID
     */
    public function userID()
    {
        $node = new UserID();
        $this->append($node);

        return end($this->children);
    }

    /**
     * @return XML
     */
    public function xml()
    {
        $node = new XML();
        $this->append($node);

        return end($this->children);
    }

    /**
     * @return string
     */
    public function nodeName()
    {
        return 'Value';
    }

    /**
     * Set text value on this node
     *
     * @param string $value
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setNodeTextValue($value)
    {
        if (!is_string($value))
            throw new \InvalidArgumentException('Argument 1 expected to be string, '.gettype($value).' seen.');

        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getNodeTextValue()
    {
        return $this->value;
    }
}