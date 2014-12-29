<?php namespace DCarbone\Camel\Node\ValueNode;

/**
 * Class Today
 * @package DCarbone\Camel\Node
 *
 * http://msdn.microsoft.com/en-us/library/office/ms460496(v=office.15).aspx
 */
class Today extends AbstractValueNode
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->allowableParents = array('Value');

        $this->allowableAttributeMap = array(
            'offset' => 'Offset',
        );
    }

    /**
     * @return string
     */
    public function nodeName()
    {
        return 'Today';
    }
}