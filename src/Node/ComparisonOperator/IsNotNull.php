<?php namespace DCarbone\Camel\Node\ComparisonOperator;

/**
 * Class IsNotNull
 * @package DCarbone\Camel\Node\ComparisonOperator
 *
 * http://msdn.microsoft.com/en-us/library/office/ms465807(v=office.15).aspx
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