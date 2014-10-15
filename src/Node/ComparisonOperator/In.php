<?php namespace DCarbone\Camel\Node\ComparisonOperator;

/**
 * Class In
 * @package DCarbone\Camel\Node\ComparisonOperator
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