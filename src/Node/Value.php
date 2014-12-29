<?php namespace DCarbone\Camel\Node;

use DCarbone\Camel\Node\ValueNode\ListProperty;
use DCarbone\Camel\Node\ValueNode\Month;
use DCarbone\Camel\Node\ValueNode\Now;
use DCarbone\Camel\Node\ValueNode\Today;
use DCarbone\Camel\Node\ValueNode\UserID;
use DCarbone\Camel\Node\ValueNode\XML;

/**
 * Class Value
 * @package DCarbone\Camel\Node
 */
class Value extends AbstractParentNode implements IValueNode
{
    /** @var string */
    protected $nodeValue = '';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->allowableChildren = array(
            'ListProperty',
            'Month',
            'Now',
            'Today',
            'UserID',
            'XML',
        );

        $this->allowableParents = array(
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

        $this->allowableAttributeMap = array(
            'type' => 'Type',
            'includetimevalue' => 'IncludeTimeValue',
        );
    }

    /**
     * @return int
     */
    public function minimumChildren()
    {
        return -1;
    }

    /**
     * @return int
     */
    public function maximumChildren()
    {
        return -1;
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
     * @param string $value
     * @return $this
     */
    public function nodeValue($value)
    {
        $this->nodeValue = (string)$value;

        return $this;
    }

    /**
     * @return string
     */
    public function getNodeValue()
    {
        return $this->nodeValue;
    }
}