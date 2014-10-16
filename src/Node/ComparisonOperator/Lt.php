<?php namespace DCarbone\Camel\Node\ComparisonOperator;

/**
 * Class Lt
 * @package DCarbone\Camel\Node\ComparisonOperator
 *
 * http://msdn.microsoft.com/en-us/library/office/ms479398(v=office.15).aspx
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