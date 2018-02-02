<?php

/**
 * Class BeginsWithTest
 */
class BeginsWithTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode::__construct
     * @covers \DCarbone\Camel\Node\ComparisonOperator\BeginsWith::__construct
     * @return \DCarbone\Camel\Node\ComparisonOperator\BeginsWith
     */
    public function testCanConstructBeginsWithNode()
    {
        $node = new \DCarbone\Camel\Node\ComparisonOperator\BeginsWith();
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\BeginsWith', $node);
        return $node;
    }

    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\BeginsWith::nodeName
     * @depends testCanConstructBeginsWithNode
     * @param \DCarbone\Camel\Node\ComparisonOperator\BeginsWith $beginsWith
     */
    public function testCanGetBeginsWithNodeName(\DCarbone\Camel\Node\ComparisonOperator\BeginsWith $beginsWith)
    {
        $name = $beginsWith->nodeName();
        $this->assertInternalType('string', $name);
        $this->assertEquals('BeginsWith', $name);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::getAllowableParents
     * @depends testCanConstructBeginsWithNode
     * @param \DCarbone\Camel\Node\ComparisonOperator\BeginsWith $beginsWith
     */
    public function testHasCorrectAllowableParents(\DCarbone\Camel\Node\ComparisonOperator\BeginsWith $beginsWith)
    {
        $allowableParents = $beginsWith->getAllowableParents();

        $this->assertInternalType('array', $allowableParents);
        $this->assertCount(5, $allowableParents);
        $this->assertContains('Expr1', $allowableParents);
        $this->assertContains('Expr2', $allowableParents);
    }
}
