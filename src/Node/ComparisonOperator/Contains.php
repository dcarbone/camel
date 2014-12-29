<?php namespace DCarbone\Camel\Node\ComparisonOperator;

/**
 * Class Contains
 * @package DCarbone\Camel\Node\ComparisonOperator
 *
 * http://msdn.microsoft.com/en-us/library/office/ms196501(v=office.15).aspx
 */
class Contains extends AbstractComparisonOperatorNode
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->allowableParents[] = 'Expr1';
        $this->allowableParents[] = 'Expr2';
    }

    /**
     * @return string
     */
    public function nodeName()
    {
        return 'Contains';
    }
}