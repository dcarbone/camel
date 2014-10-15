<?php namespace DCarbone\Camel\Node\LogicalJoin;

/**
 * Class OrNode
 * @package DCarbone\Camel\Node\LogicalJoin
 */
class OrNode extends AbstractLogicalJoinNode
{
    /**
     * @return string
     */
    public function nodeName()
    {
        return 'Or';
    }
}