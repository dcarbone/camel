<?php namespace DCarbone\Camel\Node\LogicalJoin;

/**
 * Class OrNode
 * @package DCarbone\Camel\Node\LogicalJoin
 *
 * http://msdn.microsoft.com/en-us/library/office/ms472196(v=office.15).aspx
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