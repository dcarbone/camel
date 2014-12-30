<?php

/**
 * Class GtTest
 */
class GtTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode::__construct
     * @covers \DCarbone\Camel\Node\ComparisonOperator\Gt::__construct
     * @return \DCarbone\Camel\Node\ComparisonOperator\Gt
     */
    public function testCanConstructGtNode()
    {
        $node = new \DCarbone\Camel\Node\ComparisonOperator\Gt();
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Gt', $node);
        return $node;
    }

    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\Gt::nodeName
     * @depends testCanConstructGtNode
     * @param \DCarbone\Camel\Node\ComparisonOperator\Gt $gt
     */
    public function testCanGetGtNodeName(\DCarbone\Camel\Node\ComparisonOperator\Gt $gt)
    {
        $name = $gt->nodeName();
        $this->assertInternalType('string', $name);
        $this->assertEquals('Gt', $name);
    }
}
