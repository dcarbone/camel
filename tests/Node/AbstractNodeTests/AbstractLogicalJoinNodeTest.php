<?php

/**
 * Class AbstractLogicalJoinNodeTest
 */
class AbstractLogicalJoinNodeTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode::maximumChildren
     * @uses \DCarbone\Camel\Node\LogicalJoin\OrNode
     */
    public function testCanGetCorrectMaximumChildNumber()
    {
        $orNode = new \DCarbone\Camel\Node\LogicalJoin\OrNode();
        $max = $orNode->maximumChildren();
        $this->assertInternalType('integer', $max);
        $this->assertEquals(2, $max);
    }

    /**
     * @covers \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode::minimumChildren
     * @uses \DCarbone\Camel\Node\LogicalJoin\AndNode
     */
    public function testCanGetCorrectMinimumChildNumber()
    {
        $andNode = new \DCarbone\Camel\Node\LogicalJoin\AndNode();
        $min = $andNode->minimumChildren();
        $this->assertInternalType('integer', $min);
        $this->assertEquals(2, $min);
    }

    /**
     * @covers \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode::andNode
     * @uses \DCarbone\Camel\Node\LogicalJoin\AndNode
     * @uses \DCarbone\Camel\Node\LogicalJoin\OrNode
     */
    public function testCanAppendAndNode()
    {
        $orNode = new \DCarbone\Camel\Node\LogicalJoin\OrNode();
        $orNode->andNode();
        $nodes = $orNode->children();
        $this->assertCount(1, $nodes);
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\LogicalJoin\\AndNode', $nodes[0]);
    }

    /**
     * @covers \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode::orNode
     * @uses \DCarbone\Camel\Node\LogicalJoin\OrNode
     */
    public function testCanAppendOrNode()
    {
        $orNode = new \DCarbone\Camel\Node\LogicalJoin\OrNode();
        $orNode->orNode();
        $nodes = $orNode->children();
        $this->assertCount(1, $nodes);
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\LogicalJoin\\OrNode', $nodes[0]);
    }

    /**
     * @covers \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode::beginsWith
     * @uses \DCarbone\Camel\Node\ComparisonOperator\BeginsWith
     * @uses \DCarbone\Camel\Node\LogicalJoin\OrNode
     */
    public function testCanAppendBeginsWithNode()
    {
        $orNode = new \DCarbone\Camel\Node\LogicalJoin\OrNode();
        $orNode->beginsWith();
        $nodes = $orNode->children();
        $this->assertCount(1, $nodes);
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\BeginsWith', $nodes[0]);
    }

    /**
     * @covers \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode::contains
     * @uses \DCarbone\Camel\Node\ComparisonOperator\Contains
     * @uses \DCarbone\Camel\Node\LogicalJoin\OrNode
     */
    public function testCanAppendContainsNode()
    {
        $orNode = new \DCarbone\Camel\Node\LogicalJoin\OrNode();
        $orNode->contains();
        $nodes = $orNode->children();
        $this->assertCount(1, $nodes);
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Contains', $nodes[0]);
    }

    /**
     * @covers \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode::dateRangesOverlap
     * @uses \DCarbone\Camel\Node\ComparisonOperator\DateRangesOverlap
     * @uses \DCarbone\Camel\Node\LogicalJoin\OrNode
     */
    public function testCanAppendDateRangesOverlapNode()
    {
        $orNode = new \DCarbone\Camel\Node\LogicalJoin\OrNode();
        $orNode->dateRangesOverlap();
        $nodes = $orNode->children();
        $this->assertCount(1, $nodes);
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\DateRangesOverlap', $nodes[0]);
    }

    /**
     * @covers \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode::eq
     * @uses \DCarbone\Camel\Node\ComparisonOperator\Eq
     * @uses \DCarbone\Camel\Node\LogicalJoin\OrNode
     */
    public function testCanAppendEqNode()
    {
        $orNode = new \DCarbone\Camel\Node\LogicalJoin\OrNode();
        $orNode->eq();
        $nodes = $orNode->children();
        $this->assertCount(1, $nodes);
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Eq', $nodes[0]);
    }

    /**
     * @covers \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode::geq
     * @uses \DCarbone\Camel\Node\ComparisonOperator\Geq
     * @uses \DCarbone\Camel\Node\LogicalJoin\OrNode
     */
    public function testCanAppendGeqNode()
    {
        $orNode = new \DCarbone\Camel\Node\LogicalJoin\OrNode();
        $orNode->geq();
        $nodes = $orNode->children();
        $this->assertCount(1, $nodes);
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Geq', $nodes[0]);
    }

    /**
     * @covers \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode::gt
     * @uses \DCarbone\Camel\Node\ComparisonOperator\Gt
     * @uses \DCarbone\Camel\Node\LogicalJoin\OrNode
     */
    public function testCanAppendGtNode()
    {
        $orNode = new \DCarbone\Camel\Node\LogicalJoin\OrNode();
        $orNode->gt();
        $nodes = $orNode->children();
        $this->assertCount(1, $nodes);
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Gt', $nodes[0]);
    }

    /**
     * @covers \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode::in
     * @uses \DCarbone\Camel\Node\ComparisonOperator\In
     * @uses \DCarbone\Camel\Node\LogicalJoin\OrNode
     */
    public function testCanAppendInNode()
    {
        $orNode = new \DCarbone\Camel\Node\LogicalJoin\OrNode();
        $orNode->in();
        $nodes = $orNode->children();
        $this->assertCount(1, $nodes);
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\In', $nodes[0]);
    }

    /**
     * @covers \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode::includes
     * @uses \DCarbone\Camel\Node\ComparisonOperator\Includes
     * @uses \DCarbone\Camel\Node\LogicalJoin\OrNode
     */
    public function testCanAppendIncludesNode()
    {
        $orNode = new \DCarbone\Camel\Node\LogicalJoin\OrNode();
        $orNode->includes();
        $nodes = $orNode->children();
        $this->assertCount(1, $nodes);
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Includes', $nodes[0]);
    }

    /**
     * @covers \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode::isNotNull
     * @uses \DCarbone\Camel\Node\ComparisonOperator\IsNotNull
     * @uses \DCarbone\Camel\Node\LogicalJoin\OrNode
     */
    public function testCanAppendIsNotNullNode()
    {
        $orNode = new \DCarbone\Camel\Node\LogicalJoin\OrNode();
        $orNode->isNotNull();
        $nodes = $orNode->children();
        $this->assertCount(1, $nodes);
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\IsNotNull', $nodes[0]);
    }

    /**
     * @covers \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode::isNull
     * @uses \DCarbone\Camel\Node\ComparisonOperator\IsNull
     * @uses \DCarbone\Camel\Node\LogicalJoin\OrNode
     */
    public function testCanAppendIsNullNode()
    {
        $orNode = new \DCarbone\Camel\Node\LogicalJoin\OrNode();
        $orNode->isNull();
        $nodes = $orNode->children();
        $this->assertCount(1, $nodes);
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\IsNull', $nodes[0]);
    }

    /**
     * @covers \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode::leq
     * @uses \DCarbone\Camel\Node\ComparisonOperator\Leq
     * @uses \DCarbone\Camel\Node\LogicalJoin\OrNode
     */
    public function testCanAppendLeqNode()
    {
        $orNode = new \DCarbone\Camel\Node\LogicalJoin\OrNode();
        $orNode->leq();
        $nodes = $orNode->children();
        $this->assertCount(1, $nodes);
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Leq', $nodes[0]);
    }

    /**
     * @covers \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode::lt
     * @uses \DCarbone\Camel\Node\ComparisonOperator\Lt
     * @uses \DCarbone\Camel\Node\LogicalJoin\OrNode
     */
    public function testCanAppendLtNode()
    {
        $orNode = new \DCarbone\Camel\Node\LogicalJoin\OrNode();
        $orNode->lt();
        $nodes = $orNode->children();
        $this->assertCount(1, $nodes);
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Lt', $nodes[0]);
    }

    /**
     * @covers \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode::membership
     * @uses \DCarbone\Camel\Node\ComparisonOperator\Membership
     * @uses \DCarbone\Camel\Node\LogicalJoin\OrNode
     */
    public function testCanAppendMembershipNode()
    {
        $orNode = new \DCarbone\Camel\Node\LogicalJoin\OrNode();
        $orNode->membership();
        $nodes = $orNode->children();
        $this->assertCount(1, $nodes);
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Membership', $nodes[0]);
    }

    /**
     * @covers \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode::neq
     * @uses \DCarbone\Camel\Node\ComparisonOperator\Neq
     * @uses \DCarbone\Camel\Node\LogicalJoin\OrNode
     */
    public function testCanAppendNeqNode()
    {
        $orNode = new \DCarbone\Camel\Node\LogicalJoin\OrNode();
        $orNode->neq();
        $nodes = $orNode->children();
        $this->assertCount(1, $nodes);
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Neq', $nodes[0]);
    }

    /**
     * @covers \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode::notIncludes
     * @uses \DCarbone\Camel\Node\ComparisonOperator\NotIncludes
     * @uses \DCarbone\Camel\Node\LogicalJoin\OrNode
     */
    public function testCanAppendNotIncludesNode()
    {
        $orNode = new \DCarbone\Camel\Node\LogicalJoin\OrNode();
        $orNode->notIncludes();
        $nodes = $orNode->children();
        $this->assertCount(1, $nodes);
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\NotIncludes', $nodes[0]);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractParentNode::append
     * @covers \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode::maximumChildren
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\AbstractParentNode
     * @uses \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode
     * @uses \DCarbone\Camel\Node\LogicalJoin\AndNode
     * @expectedException \LogicException
     */
    public function testCannotAddMoreThanTwoChildNodes()
    {
        $andNode = new \DCarbone\Camel\Node\LogicalJoin\AndNode();

        $andNode->eq();
        $andNode->eq();
        $andNode->eq();
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::__toString
     * @covers \DCarbone\Camel\Node\AbstractParentNode::minimumChildren
     * @uses \DCarbone\Camel\Node\LogicalJoin\OrNode
     */
    public function testCannotTypecastToStringWithOnlyOneChild()
    {
        $orNode = new \DCarbone\Camel\Node\LogicalJoin\OrNode();
        $orNode->eq();
        $this->assertEquals('', @(string)$orNode);
    }
}