<?php

/**
 * Class IsNullTest
 */
class IsNullTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode::__construct
     * @covers \DCarbone\Camel\Node\ComparisonOperator\IsNull::__construct
     * @return \DCarbone\Camel\Node\ComparisonOperator\IsNull
     */
    public function testCanConstructIsNullNode()
    {
        $node = new \DCarbone\Camel\Node\ComparisonOperator\IsNull();
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\IsNull', $node);
        return $node;
    }

    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\IsNull::nodeName
     * @depends testCanConstructIsNullNode
     * @param \DCarbone\Camel\Node\ComparisonOperator\IsNull $isNull
     */
    public function testCanGetIsNullNodeName(\DCarbone\Camel\Node\ComparisonOperator\IsNull $isNull)
    {
        $name = $isNull->nodeName();
        $this->assertInternalType('string', $name);
        $this->assertEquals('IsNull', $name);
    }
}
