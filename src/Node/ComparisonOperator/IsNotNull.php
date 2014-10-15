<?php namespace DCarbone\Camel\Node\ComparisonOperator;

/**
 * Class IsNotNull
 * @package DCarbone\Camel\Node\ComparisonOperator
 */
class IsNotNull extends AbstractComparisonOperatorNode
{
    /**
     * @return string
     */
    public function nodeName()
    {
        return 'IsNotNull';
    }
}