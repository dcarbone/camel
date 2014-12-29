<?php

/**
 * Class AbstractComparisonOperatorNodeTest
 */
class AbstractComparisonOperatorNodeTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode::__construct
     * @uses \DCarbone\Camel\Node\ComparisonOperator\Leq
     * @return \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode
     */
    public function testCanConstructComparisonOperatorNode()
    {
        $leq = new \DCarbone\Camel\Node\ComparisonOperator\Leq();
        $this->assertInstanceOf(
            '\\DCarbone\\Camel\\Node\\ComparisonOperator\\AbstractComparisonOperatorNode',
            $leq);

        return $leq;
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::getAllowableParents
     * @depends testCanConstructComparisonOperatorNode
     * @param \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode $node
     */
    public function testHasCorrectBaseAllowableParents(\DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode $node)
    {
        $allowableParents = $node->getAllowableParents();

        $this->assertInternalType('array', $allowableParents);
        $this->assertCount(3, $allowableParents);
        $this->assertContains('And', $allowableParents);
        $this->assertContains('Or', $allowableParents);
        $this->assertContains('Where', $allowableParents);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractParentNode::getAllowableChildren
     * @depends testCanConstructComparisonOperatorNode
     * @param \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode $node
     */
    public function testHasCorrectBaseAllowableChildren(\DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode $node)
    {
        $allowableChildren = $node->getAllowableChildren();

        $this->assertInternalType('array', $allowableChildren);
        $this->assertCount(3, $allowableChildren);
        $this->assertContains('FieldRef', $allowableChildren);
        $this->assertContains('Value', $allowableChildren);
        $this->assertContains('XML', $allowableChildren);
    }

    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode::maximumChildren
     * @depends testCanConstructComparisonOperatorNode
     * @param \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode $node
     */
    public function testCanGetCorrectMaximumChildNumber(\DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode $node)
    {
        $max = $node->maximumChildren();
        $this->assertInternalType('integer', $max);
        $this->assertEquals(-1, $max);
    }

    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode::minimumChildren
     * @depends testCanConstructComparisonOperatorNode
     * @param \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode $node
     */
    public function testCanGetCorrectMinimumChildNumber(\DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode $node)
    {
        $min = $node->minimumChildren();
        $this->assertInternalType('integer', $min);
        $this->assertEquals(-1, $min);
    }

    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode::fieldRef
     * @uses \DCarbone\Camel\Node\FieldRef
     */
    public function testCanAppendFieldRefNode()
    {
        $leq = new \DCarbone\Camel\Node\ComparisonOperator\Leq();
        $leq->fieldRef();
        $children = $leq->children();
        $this->assertInternalType('array', $children);
        $this->assertCount(1, $children);
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\FieldRef', $children[0]);
    }

    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode::value
     * @uses \DCarbone\Camel\Node\Value
     */
    public function testCanAppendValueNode()
    {
        $leq = new \DCarbone\Camel\Node\ComparisonOperator\Leq();
        $leq->value();
        $children = $leq->children();
        $this->assertInternalType('array', $children);
        $this->assertCount(1, $children);
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\Value', $children[0]);
    }

    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode::xml
     * @uses \DCarbone\Camel\Node\ValueNode\XML
     */
    public function testCanAppendXMLNode()
    {
        $leq = new \DCarbone\Camel\Node\ComparisonOperator\Leq();
        $leq->xml();
        $children = $leq->children();
        $this->assertInternalType('array', $children);
        $this->assertCount(1, $children);
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ValueNode\\XML', $children[0]);
    }
}