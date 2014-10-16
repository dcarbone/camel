<?php namespace DCarbone\Camel\Node;

/**
 * Class UserID
 * @package DCarbone\Camel\Node
 *
 * http://msdn.microsoft.com/en-us/library/office/ff625789(v=office.15).aspx
 */
class UserID extends AbstractNode implements IValueNode
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
        return 'UserID';
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