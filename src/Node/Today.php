<?php namespace DCarbone\Camel\Node;

/**
 * Class Today
 * @package DCarbone\Camel\Node
 *
 * http://msdn.microsoft.com/en-us/library/office/ms460496(v=office.15).aspx
 */
class Today extends AbstractNode
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->validParents = array('Value');

        $this->validAttributeMap = array(
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