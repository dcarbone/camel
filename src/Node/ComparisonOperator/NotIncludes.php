<?php namespace DCarbone\Camel\Node\ComparisonOperator;

/**
 * Class NotIncludes
 * @package DCarbone\Camel\Node\ComparisonOperator
 */
class NotIncludes extends AbstractComparisonOperatorNode
{
    /**
     * @return string
     */
    public function nodeName()
    {
        return 'NotIncludes';
    }
}