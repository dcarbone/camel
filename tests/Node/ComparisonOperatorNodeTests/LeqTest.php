<?php

/**
 * Class LeqTest
 */
class LeqTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode::__construct
     * @covers \DCarbone\Camel\Node\ComparisonOperator\Leq::__construct
     * @return \DCarbone\Camel\Node\ComparisonOperator\Leq
     */
    public function testCanConstructLeqNode()
    {
        $node = new \DCarbone\Camel\Node\ComparisonOperator\Leq();
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Leq', $node);
        return $node;
    }

    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\Leq::nodeName
     * @depends testCanConstructLeqNode
     * @param \DCarbone\Camel\Node\ComparisonOperator\Leq $leq
     */
    public function testCanGetLeqNodeName(\DCarbone\Camel\Node\ComparisonOperator\Leq $leq)
    {
        $name = $leq->nodeName();
        $this->assertInternalType('string', $name);
        $this->assertEquals('Leq', $name);
    }
}
