<?php namespace DCarbone\Camel\Node\ComparisonOperator;

/**
 * Class Neq
 * @package DCarbone\Camel\Node\ComparisonOperator
 */
class Neq extends AbstractComparisonOperatorNode
{
    /**
     * @return string
     */
    public function nodeName()
    {
        return 'Neq';
    }
}