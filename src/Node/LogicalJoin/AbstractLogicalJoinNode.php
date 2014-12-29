<?php namespace DCarbone\Camel\Node\LogicalJoin;

use DCarbone\Camel\Node\AbstractParentNode;
use DCarbone\Camel\Node\ComparisonOperator as Comparator;

/**
 * Class AbstractLogicalJoinNode
 * @package DCarbone\Camel\Node\LogicalJoin
 */
abstract class AbstractLogicalJoinNode extends AbstractParentNode
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->validParents = array(
            'And',
            'Expr1',
            'Expr2',
            'Or',
            'Where',
        );

        $this->validChildren = array(
            'And',
            'BeginsWith',
            'Contains',
            'DateRangesOverlap',
            'Eq',
            'Geq',
            'Gt',
            'In',
            'Includes',
            'IsNotNull',
            'IsNull',
            'Leq',
            'Lt',
            'Membership',
            'Neq',
            'NotIncludes',
            'Or',
        );
    }

    /**
     * @return int
     */
    public function minimumChildren()
    {
        return 2;
    }

    /**
     * @return int
     */
    public function maximumChildren()
    {
        return 2;
    }

    /**
     * @return AndNode
     */
    public function andNode()
    {
        $node = new AndNode();
        $this->append($node);
        return end($this->children);
    }

    /**
     * @return OrNode
     */
    public function orNode()
    {
        $node = new OrNode();
        $this->append($node);
        return end($this->children);
    }

    /**
     * @return Comparator\BeginsWith
     */
    public function beginsWith()
    {
        $node = new Comparator\BeginsWith();
        $this->append($node);
        return end($this->children);
    }

    /**
     * @return Comparator\Contains
     */
    public function contains()
    {
        $node = new Comparator\Contains();
        $this->append($node);
        return end($this->children);
    }

    /**
     * @return Comparator\DateRangesOverlap
     */
    public function dateRangesOverlap()
    {
        $node = new Comparator\DateRangesOverlap();
        $this->append($node);
        return end($this->children);
    }

    /**
     * @return Comparator\Eq
     */
    public function eq()
    {
        $node = new Comparator\Eq();
        $this->append($node);
        return end($this->children);
    }

    /**
     * @return Comparator\Geq
     */
    public function geq()
    {
        $node = new Comparator\Geq();
        $this->append($node);
        return end($this->children);
    }

    /**
     * @return Comparator\Gt
     */
    public function gt()
    {
        $node = new Comparator\Gt();
        $this->append($node);
        return end($this->children);
    }

    /**
     * @return Comparator\In
     */
    public function in()
    {
        $node = new Comparator\In();
        $this->append($node);
        return end($this->children);
    }

    /**
     * @return Comparator\Includes
     */
    public function includes()
    {
        $node = new Comparator\Includes();
        $this->append($node);
        return end($this->children);
    }

    /**
     * @return Comparator\IsNotNull
     */
    public function isNotNull()
    {
        $node = new Comparator\IsNotNull();
        $this->append($node);
        return end($this->children);
    }

    /**
     * @return Comparator\IsNull
     */
    public function isNull()
    {
        $node = new Comparator\IsNull();
        $this->append($node);
        return end($this->children);
    }

    /**
     * @return Comparator\Leq
     */
    public function leq()
    {
        $node = new Comparator\Leq();
        $this->append($node);
        return end($this->children);
    }

    /**
     * @return Comparator\Lt
     */
    public function lt()
    {
        $node = new Comparator\Lt();
        $this->append($node);
        return end($this->children);
    }

    /**
     * @return Comparator\Membership
     */
    public function membership()
    {
        $node = new Comparator\Membership();
        $this->append($node);
        return end($this->children);
    }

    /**
     * @return Comparator\Neq
     */
    public function neq()
    {
        $node = new Comparator\Neq();
        $this->append($node);
        return end($this->children);
    }

    /**
     * @return Comparator\NotIncludes
     */
    public function notIncludes()
    {
        $node = new Comparator\NotIncludes();
        $this->append($node);
        return end($this->children);
    }
}