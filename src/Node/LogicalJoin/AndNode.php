<?php namespace DCarbone\Camel\Node\LogicalJoin;

/**
 * Class AndNode
 * @package DCarbone\Camel\Node\LogicalJoin
 *
 * http://msdn.microsoft.com/en-us/library/office/ms196939(v=office.15).aspx
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