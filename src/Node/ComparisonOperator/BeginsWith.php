<?php namespace DCarbone\Camel\Node\ComparisonOperator;

/**
 * Class BeginsWith
 * @package DCarbone\Camel\Node\ComparisonOperator
 *
 * http://msdn.microsoft.com/en-us/library/office/ms476051(v=office.15).aspx
 */
class BeginsWith extends AbstractComparisonOperatorNode
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->validParents[] = 'Expr1';
        $this->validParents[] = 'Expr2';
    }

    /**
     * @return string
     */
    public function nodeName()
    {
        return 'BeginsWith';
    }
}