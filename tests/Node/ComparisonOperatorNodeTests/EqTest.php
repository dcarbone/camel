<?php

/**
 * Class EqTest
 */
class EqTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode::__construct
     * @covers \DCarbone\Camel\Node\ComparisonOperator\Eq::__construct
     * @return \DCarbone\Camel\Node\ComparisonOperator\Eq
     */
    public function testCanConstructEqNode()
    {
        $node = new \DCarbone\Camel\Node\ComparisonOperator\Eq();
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Eq', $node);
        return $node;
    }

    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\Eq::nodeName
     * @depends testCanConstructEqNode
     * @param \DCarbone\Camel\Node\ComparisonOperator\Eq $eq
     */
    public function testCanGetEqNodeName(\DCarbone\Camel\Node\ComparisonOperator\Eq $eq)
    {
        $name = $eq->nodeName();
        $this->assertInternalType('string', $name);
        $this->assertEquals('Eq', $name);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::getAllowableParents
     * @depends testCanConstructEqNode
     * @param \DCarbone\Camel\Node\ComparisonOperator\Eq $eq
     */
    public function testHasCorrectAllowableParents(\DCarbone\Camel\Node\ComparisonOperator\Eq $eq)
    {
        $allowableParents = $eq->getAllowableParents();

        $this->assertInternalType('array', $allowableParents);
        $this->assertCount(5, $allowableParents);
        $this->assertContains('Expr1', $allowableParents);
        $this->assertContains('Expr2', $allowableParents);
    }
}
