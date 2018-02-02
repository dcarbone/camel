<?php

/**
 * Class WhereTest
 */
class WhereTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers \DCarbone\Camel\Camel::where
     * @covers \DCarbone\Camel\Hump\Where::__construct
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Hump\AbstractHump
     * @uses \DCarbone\Camel\Hump\Where
     * @return \DCarbone\Camel\Hump\Where
     */
    public function testCanGetWhereInstance()
    {
        $camel = new \DCarbone\Camel\Camel();

        $where = $camel->where();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Hump\\Where', $where);

        return $where;
    }

    /**
     * @covers \DCarbone\Camel\Hump\Where::nodeName
     * @uses \DCarbone\Camel\Hump\Where
     * @depends testCanGetWhereInstance
     * @param \DCarbone\Camel\Hump\Where $where
     */
    public function testCanGetNodeName(\DCarbone\Camel\Hump\Where $where)
    {
        $name = $where->nodeName();

        $this->assertInternalType('string', $name);
        $this->assertEquals('Where', $name);
    }

    /**
     * @covers \DCarbone\Camel\Hump\Where::getAllowableChildren
     * @uses \DCarbone\Camel\Hump\Where
     * @depends testCanGetWhereInstance
     * @param \DCarbone\Camel\Hump\Where $where
     */
    public function testCanGetValidChildrenArray(\DCarbone\Camel\Hump\Where $where)
    {
        $children = $where->getAllowableChildren();

        $this->assertInternalType('array', $children);
        $this->assertCount(17, $children);
        $this->assertEquals(
            array(
                'Or',
                'And',
                'BeginsWith',
                'Contains',
                'DateRangesOverlap',
                'Eq',
                'Geq',
                'Gt',
                'In',
                'IsNotNull',
                'IsNull',
                'Includes',
                'Leq',
                'Lt',
                'Membership',
                'Neq',
                'NotIncludes',
            ),
            $children);
    }

    /**
     * @covers \DCarbone\Camel\Hump\Where::root
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Hump\Where
     * @uses \DCarbone\Camel\Hump\AbstractHump
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\AbstractParentNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode
     * @return \DCarbone\Camel\Hump\Where
     */
    public function testCanSetRootNode()
    {
        $camel = new \DCarbone\Camel\Camel();

        $where = $camel->where();

        $eq = $where->root('eq');

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Eq', $eq);

        return $where;
    }

    /**
     * @covers \DCarbone\Camel\Hump\Where::root
     * @uses \DCarbone\Camel\Hump\Where
     * @expectedException \LogicException
     * @depends testCanSetRootNode
     * @param \DCarbone\Camel\Hump\Where $where
     */
    public function testExceptionThrownWhenSettingAdditionalRootNodes(\DCarbone\Camel\Hump\Where $where)
    {
        $where->root('neq');
    }

    /**
     * @covers \DCarbone\Camel\Hump\Where::root
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Hump\Where
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionThrownWhenSettingUnknownRootNode()
    {
        $camel = new \DCarbone\Camel\Camel();

        $where = $camel->where();

        $where->root('asdf');
    }

    /**
     * @covers \DCarbone\Camel\Hump\Where::andNode
     * @covers \DCarbone\Camel\Hump\Where::root
     * @uses \DCarbone\Camel\Hump\Where
     * @uses \DCarbone\Camel\Hump\AbstractHump
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\AbstractParentNode
     * @uses \DCarbone\Camel\Node\IParentNode
     * @uses \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode
     * @uses \DCarbone\Camel\Node\LogicalJoin\AndNode
     */
    public function testCanSetAndRootNode()
    {
        $camel = new \DCarbone\Camel\Camel();
        $where = $camel->where();

        $and = $where->andNode();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\LogicalJoin\\AndNode', $and);
    }

    /**
     * @covers \DCarbone\Camel\Hump\Where::orNode
     * @covers \DCarbone\Camel\Hump\Where::root
     * @uses \DCarbone\Camel\Hump\Where
     * @uses \DCarbone\Camel\Hump\AbstractHump
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\AbstractParentNode
     * @uses \DCarbone\Camel\Node\IParentNode
     * @uses \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode
     * @uses \DCarbone\Camel\Node\LogicalJoin\OrNode
     */
    public function testCanSetOrRootNode()
    {
        $camel = new \DCarbone\Camel\Camel();
        $where = $camel->where();

        $or = $where->orNode();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\LogicalJoin\\OrNode', $or);
    }

    /**
     * @covers \DCarbone\Camel\Hump\Where::beginsWith
     * @covers \DCarbone\Camel\Hump\Where::root
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Hump\AbstractHump
     * @uses \DCarbone\Camel\Hump\Where
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\BeginsWith
     */
    public function testCanSetBeginsWithRootNode()
    {
        $camel = new \DCarbone\Camel\Camel();
        $where = $camel->where();

        $beginsWith = $where->beginsWith();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\BeginsWith', $beginsWith);
    }

    /**
     * @covers \DCarbone\Camel\Hump\Where::contains
     * @covers \DCarbone\Camel\Hump\Where::root
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Hump\AbstractHump
     * @uses \DCarbone\Camel\Hump\Where
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\Contains
     */
    public function testCanSetContainsRootNode()
    {
        $camel = new \DCarbone\Camel\Camel();
        $where = $camel->where();

        $contains = $where->contains();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Contains', $contains);
    }

    /**
     * @covers \DCarbone\Camel\Hump\Where::dateRangesOverlap
     * @covers \DCarbone\Camel\Hump\Where::root
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Hump\AbstractHump
     * @uses \DCarbone\Camel\Hump\Where
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\DateRangesOverlap
     */
    public function testCanSetDateRangesOverlapRootNode()
    {
        $camel = new \DCarbone\Camel\Camel();
        $where = $camel->where();

        $dateRangesOverlap = $where->dateRangesOverlap();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\DateRangesOverlap', $dateRangesOverlap);
    }

    /**
     * @covers \DCarbone\Camel\Hump\Where::eq
     * @covers \DCarbone\Camel\Hump\Where::root
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Hump\AbstractHump
     * @uses \DCarbone\Camel\Hump\Where
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\Eq
     */
    public function testCanSetEqRootNode()
    {
        $camel = new \DCarbone\Camel\Camel();
        $where = $camel->where();

        $eq = $where->eq();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Eq', $eq);
    }

    /**
     * @covers \DCarbone\Camel\Hump\Where::geq
     * @covers \DCarbone\Camel\Hump\Where::root
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Hump\AbstractHump
     * @uses \DCarbone\Camel\Hump\Where
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\Geq
     */
    public function testCanSetGeqRootNode()
    {
        $camel = new \DCarbone\Camel\Camel();
        $where = $camel->where();

        $geq = $where->geq();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Geq', $geq);
    }

    /**
     * @covers \DCarbone\Camel\Hump\Where::gt
     * @covers \DCarbone\Camel\Hump\Where::root
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Hump\AbstractHump
     * @uses \DCarbone\Camel\Hump\Where
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\Gt
     */
    public function testCanSetGtRootNode()
    {
        $camel = new \DCarbone\Camel\Camel();
        $where = $camel->where();

        $gt = $where->gt();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Gt', $gt);
    }

    /**
     * @covers \DCarbone\Camel\Hump\Where::in
     * @covers \DCarbone\Camel\Hump\Where::root
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Hump\AbstractHump
     * @uses \DCarbone\Camel\Hump\Where
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\In
     */
    public function testCanSetInRootNode()
    {
        $camel = new \DCarbone\Camel\Camel();
        $where = $camel->where();

        $in = $where->in();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\In', $in);
    }

    /**
     * @covers \DCarbone\Camel\Hump\Where::includes
     * @covers \DCarbone\Camel\Hump\Where::root
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Hump\AbstractHump
     * @uses \DCarbone\Camel\Hump\Where
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\Includes
     */
    public function testCanSetIncludesRootNode()
    {
        $camel = new \DCarbone\Camel\Camel();
        $where = $camel->where();

        $includes = $where->includes();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Includes', $includes);
    }

    /**
     * @covers \DCarbone\Camel\Hump\Where::isNotNull
     * @covers \DCarbone\Camel\Hump\Where::root
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Hump\AbstractHump
     * @uses \DCarbone\Camel\Hump\Where
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\IsNotNull
     */
    public function testCanSetIsNotNullRootNode()
    {
        $camel = new \DCarbone\Camel\Camel();
        $where = $camel->where();

        $isNotNull = $where->isNotNull();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\IsNotNull', $isNotNull);
    }

    /**
     * @covers \DCarbone\Camel\Hump\Where::isNull
     * @covers \DCarbone\Camel\Hump\Where::root
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Hump\AbstractHump
     * @uses \DCarbone\Camel\Hump\Where
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\IsNull
     */
    public function testCanSetIsNullRootNode()
    {
        $camel = new \DCarbone\Camel\Camel();
        $where = $camel->where();

        $isNull = $where->isNull();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\IsNull', $isNull);
    }

    /**
     * @covers \DCarbone\Camel\Hump\Where::leq
     * @covers \DCarbone\Camel\Hump\Where::root
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Hump\AbstractHump
     * @uses \DCarbone\Camel\Hump\Where
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\Leq
     */
    public function testCanSetLeqRootNode()
    {
        $camel = new \DCarbone\Camel\Camel();
        $where = $camel->where();

        $leq = $where->leq();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Leq', $leq);
    }

    /**
     * @covers \DCarbone\Camel\Hump\Where::lt
     * @covers \DCarbone\Camel\Hump\Where::root
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Hump\AbstractHump
     * @uses \DCarbone\Camel\Hump\Where
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\Lt
     */
    public function testCanSetLtRootNode()
    {
        $camel = new \DCarbone\Camel\Camel();
        $where = $camel->where();

        $lt = $where->lt();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Lt', $lt);
    }

    /**
     * @covers \DCarbone\Camel\Hump\Where::membership
     * @covers \DCarbone\Camel\Hump\Where::root
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Hump\AbstractHump
     * @uses \DCarbone\Camel\Hump\Where
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\Membership
     */
    public function testCanSetMembershipRootNode()
    {
        $camel = new \DCarbone\Camel\Camel();
        $where = $camel->where();

        $membership = $where->membership();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Membership', $membership);
    }

    /**
     * @covers \DCarbone\Camel\Hump\Where::neq
     * @covers \DCarbone\Camel\Hump\Where::root
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Hump\AbstractHump
     * @uses \DCarbone\Camel\Hump\Where
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\Neq
     */
    public function testCanSetNeqRootNode()
    {
        $camel = new \DCarbone\Camel\Camel();
        $where = $camel->where();

        $neq = $where->neq();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Neq', $neq);
    }

    /**
     * @covers \DCarbone\Camel\Hump\Where::notIncludes
     * @covers \DCarbone\Camel\Hump\Where::root
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Hump\AbstractHump
     * @uses \DCarbone\Camel\Hump\Where
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode
     * @uses \DCarbone\Camel\Node\ComparisonOperator\NotIncludes
     */
    public function testCanSetNotIncludesRootNode()
    {
        $camel = new \DCarbone\Camel\Camel();
        $where = $camel->where();

        $notIncludes = $where->notIncludes();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\NotIncludes', $notIncludes);
    }
}
 