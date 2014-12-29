<?php namespace DCarbone\Camel\Node\ValueNode;

/**
 * Class Month
 * @package DCarbone\Camel\Node
 *
 * http://msdn.microsoft.com/en-us/library/office/ff625796(v=office.15).aspx
 */
class Month extends AbstractValueNode
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
        return 'Month';
    }
}