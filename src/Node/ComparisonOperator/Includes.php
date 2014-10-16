<?php namespace DCarbone\Camel\Node\ComparisonOperator;

/**
 * Class Includes
 * @package DCarbone\Camel\Node\ComparisonOperator
 *
 * http://msdn.microsoft.com/en-us/library/office/ff630172(v=office.15).aspx
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