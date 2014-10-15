<?php namespace DCarbone\Camel\Node\ComparisonOperator;

/**
 * Class Includes
 * @package DCarbone\Camel\Node\ComparisonOperator
 */
class Includes extends AbstractComparisonOperatorNode
{
    /**
     * @return string
     */
    public function nodeName()
    {
        return 'Includes';
    }
}