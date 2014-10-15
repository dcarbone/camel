<?php namespace DCarbone\Camel\Node\ComparisonOperator;

/**
 * Class DateRangesOverlap
 * @package DCarbone\Camel\Node\ComparisonOperator
 */
class DateRangesOverlap extends AbstractComparisonOperatorNode
{
    /**
     * @return string
     */
    public function nodeName()
    {
        return 'DateRangesOverlap';
    }
}