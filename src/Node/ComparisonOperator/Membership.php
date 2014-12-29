<?php namespace DCarbone\Camel\Node\ComparisonOperator;

/**
 * Class Membership
 * @package DCarbone\Camel\Node\ComparisonOperator
 *
 * http://msdn.microsoft.com/en-us/library/office/aa544234(v=office.15).aspx
 */
class Membership extends AbstractComparisonOperatorNode
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->allowableAttributeMap = array(
            'type' => 'Type',
        );
    }

    /**
     * @return string
     */
    public function nodeName()
    {
        return 'Membership';
    }
}