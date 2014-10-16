<?php namespace DCarbone\Camel\Node\ComparisonOperator;

/**
 * Class NotIncludes
 * @package DCarbone\Camel\Node\ComparisonOperator
 *
 * http://msdn.microsoft.com/en-us/library/office/ff630174(v=office.15).aspx
 */
class NotIncludes extends AbstractComparisonOperatorNode
{
    /**
     * @return string
     */
    public function nodeName()
    {
        return 'NotIncludes';
    }
}