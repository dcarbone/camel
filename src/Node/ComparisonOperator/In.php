<?php namespace DCarbone\Camel\Node\ComparisonOperator;

/**
 * Class In
 * @package DCarbone\Camel\Node\ComparisonOperator
 *
 * http://msdn.microsoft.com/en-us/library/office/ff625761(v=office.15).aspx
 */
class In extends AbstractComparisonOperatorNode
{
    /**
     * @return string
     */
    public function nodeName()
    {
        return 'In';
    }
}