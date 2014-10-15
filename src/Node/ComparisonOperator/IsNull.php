<?php namespace DCarbone\Camel\Node\ComparisonOperator;

/**
 * Class IsNull
 * @package DCarbone\Camel\Node\ComparisonOperator
 */
class IsNull extends AbstractComparisonOperatorNode
{
    /**
     * @return string
     */
    public function nodeName()
    {
        return 'IsNull';
    }
}