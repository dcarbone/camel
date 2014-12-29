<?php

/**
 * Class NeqTest
 */
class NeqTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode::__construct
     * @covers \DCarbone\Camel\Node\ComparisonOperator\Neq::__construct
     * @return \DCarbone\Camel\Node\ComparisonOperator\Neq
     */
    public function testCanConstructNeqNode()
    {
        $node = new \DCarbone\Camel\Node\ComparisonOperator\Neq();
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Neq', $node);
        return $node;
    }

    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\Neq::nodeName
     * @depends testCanConstructNeqNode
     * @param \DCarbone\Camel\Node\ComparisonOperator\Neq $neq
     */
    public function testCanGetNeqNodeName(\DCarbone\Camel\Node\ComparisonOperator\Neq $neq)
    {
        $name = $neq->nodeName();
        $this->assertInternalType('string', $name);
        $this->assertEquals('Neq', $name);
    }
}
