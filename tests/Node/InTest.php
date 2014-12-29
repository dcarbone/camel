<?php

/**
 * Class InTest
 */
class InTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode::__construct
     * @covers \DCarbone\Camel\Node\ComparisonOperator\In::__construct
     * @return \DCarbone\Camel\Node\ComparisonOperator\In
     */
    public function testCanConstructInNode()
    {
        $node = new \DCarbone\Camel\Node\ComparisonOperator\In();
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\In', $node);
        return $node;
    }

    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\In::nodeName
     * @depends testCanConstructInNode
     * @param \DCarbone\Camel\Node\ComparisonOperator\In $in
     */
    public function testCanGetInNodeName(\DCarbone\Camel\Node\ComparisonOperator\In $in)
    {
        $name = $in->nodeName();
        $this->assertInternalType('string', $name);
        $this->assertEquals('In', $name);
    }
}
