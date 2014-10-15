<?php namespace DCarbone\Camel\Node\ComparisonOperator;

/**
 * Class Gt
 * @package DCarbone\Camel\Node\ComparisonOperator
 */
class Gt extends AbstractComparisonOperatorNode
{
    /**
     * @return string
     */
    public function nodeName()
    {
        return 'Gt';
    }
}