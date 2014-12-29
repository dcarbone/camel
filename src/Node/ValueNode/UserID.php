<?php namespace DCarbone\Camel\Node\ValueNode;

/**
 * Class UserID
 * @package DCarbone\Camel\Node
 *
 * http://msdn.microsoft.com/en-us/library/office/ff625789(v=office.15).aspx
 */
class UserID extends AbstractValueNode
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->allowableParents = array('Value');
    }

    /**
     * @return string
     */
    public function nodeName()
    {
        return 'UserID';
    }
}