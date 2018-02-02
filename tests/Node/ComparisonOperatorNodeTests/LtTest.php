<?php

/**
 * Class LtTest
 */
class LtTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode::__construct
     * @covers \DCarbone\Camel\Node\ComparisonOperator\Lt::__construct
     * @return \DCarbone\Camel\Node\ComparisonOperator\Lt
     */
    public function testCanConstructLtNode()
    {
        $node = new \DCarbone\Camel\Node\ComparisonOperator\Lt();
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Lt', $node);
        return $node;
    }

    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\Lt::nodeName
     * @depends testCanConstructLtNode
     * @param \DCarbone\Camel\Node\ComparisonOperator\Lt $lt
     */
    public function testCanGetLtNodeName(\DCarbone\Camel\Node\ComparisonOperator\Lt $lt)
    {
        $name = $lt->nodeName();
        $this->assertInternalType('string', $name);
        $this->assertEquals('Lt', $name);
    }
}
