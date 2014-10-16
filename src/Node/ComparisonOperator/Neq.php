<?php namespace DCarbone\Camel\Node\ComparisonOperator;

/**
 * Class Neq
 * @package DCarbone\Camel\Node\ComparisonOperator
 *
 * http://msdn.microsoft.com/en-us/library/office/ms452901(v=office.15).aspx
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