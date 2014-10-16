<?php namespace DCarbone\Camel\Node\ComparisonOperator;

/**
 * Class Gt
 * @package DCarbone\Camel\Node\ComparisonOperator
 *
 * http://msdn.microsoft.com/en-us/library/office/ms458990(v=office.15).aspx
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