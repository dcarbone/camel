<?php namespace DCarbone\Camel\Node\ComparisonOperator;

/**
 * Class Geq
 * @package DCarbone\Camel\Node\ComparisonOperator
 */
class Geq extends AbstractComparisonOperatorNode
{
    /**
     * @return string
     */
    public function nodeName()
    {
        return 'Geq';
    }
}