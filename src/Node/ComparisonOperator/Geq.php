<?php namespace DCarbone\Camel\Node\ComparisonOperator;

/**
 * Class Geq
 * @package DCarbone\Camel\Node\ComparisonOperator
 *
 * http://msdn.microsoft.com/en-us/library/office/ms416296(v=office.15).aspx
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