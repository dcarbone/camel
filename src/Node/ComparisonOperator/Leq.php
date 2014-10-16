<?php namespace DCarbone\Camel\Node\ComparisonOperator;

/**
 * Class Leq
 * @package DCarbone\Camel\Node\ComparisonOperator
 *
 * http://msdn.microsoft.com/en-us/library/office/ms431787(v=office.15).aspx
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