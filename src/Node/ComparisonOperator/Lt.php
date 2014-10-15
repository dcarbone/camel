<?php namespace DCarbone\Camel\Node\ComparisonOperator;

/**
 * Class Lt
 * @package DCarbone\Camel\Node\ComparisonOperator
 */
class Lt extends AbstractComparisonOperatorNode
{
    /**
     * @return string
     */
    public function nodeName()
    {
        return 'Lt';
    }
}