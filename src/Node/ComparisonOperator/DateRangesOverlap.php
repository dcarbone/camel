<?php namespace DCarbone\Camel\Node\ComparisonOperator;

/**
 * Class DateRangesOverlap
 * @package DCarbone\Camel\Node\ComparisonOperator
 *
 * http://msdn.microsoft.com/en-us/library/office/ms436080(v=office.15).aspx
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