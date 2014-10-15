<?php namespace DCarbone\Camel\Node\LogicalJoin;

/**
 * Class AndNode
 * @package DCarbone\Camel\Node\LogicalJoin
 */
class AndNode extends AbstractLogicalJoinNode
{
    /**
     * @return string
     */
    public function nodeName()
    {
        return 'And';
    }
}