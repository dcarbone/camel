<?php namespace DCarbone\Camel\Node\ComparisonOperator;

/**
 * Class IsNull
 * @package DCarbone\Camel\Node\ComparisonOperator
 *
 * http://msdn.microsoft.com/en-us/library/office/ms462425(v=office.15).aspx
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