<?php namespace DCarbone\Camel\Node;

/**
 * Class Today
 * @package DCarbone\Camel\Node
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