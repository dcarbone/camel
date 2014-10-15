<?php namespace DCarbone\Camel\Node\ComparisonOperator;

/**
 * Class Leq
 * @package DCarbone\Camel\Node\ComparisonOperator
 */
class Leq extends AbstractComparisonOperatorNode
{
    /**
     * @return string
     */
    public function nodeName()
    {
        return 'Leq';
    }
}