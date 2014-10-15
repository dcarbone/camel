<?php namespace DCarbone\Camel\Node\ComparisonOperator;

/**
 * Class Membership
 * @package DCarbone\Camel\Node\ComparisonOperator
 */
class Membership extends AbstractComparisonOperatorNode
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->validAttributeMap = array(
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