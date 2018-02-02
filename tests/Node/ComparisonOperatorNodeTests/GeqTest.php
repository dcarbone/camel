<?php

/**
 * Class GeqTest
 */
class GeqTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode::__construct
     * @covers \DCarbone\Camel\Node\ComparisonOperator\Geq::__construct
     * @return \DCarbone\Camel\Node\ComparisonOperator\Geq
     */
    public function testCanConstructGeqNode()
    {
        $node = new \DCarbone\Camel\Node\ComparisonOperator\Geq();
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Geq', $node);
        return $node;
    }

    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\Geq::nodeName
     * @depends testCanConstructGeqNode
     * @param \DCarbone\Camel\Node\ComparisonOperator\Geq $geq
     */
    public function testCanGetGeqNodeName(\DCarbone\Camel\Node\ComparisonOperator\Geq $geq)
    {
        $name = $geq->nodeName();
        $this->assertInternalType('string', $name);
        $this->assertEquals('Geq', $name);
    }
}
