<?php

/**
 * Class IsNotNullTest
 */
class IsNotNullTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode::__construct
     * @covers \DCarbone\Camel\Node\ComparisonOperator\IsNotNull::__construct
     * @return \DCarbone\Camel\Node\ComparisonOperator\IsNotNull
     */
    public function testCanConstructIsNotNullNode()
    {
        $node = new \DCarbone\Camel\Node\ComparisonOperator\IsNotNull();
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\IsNotNull', $node);
        return $node;
    }

    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\IsNotNull::nodeName
     * @depends testCanConstructIsNotNullNode
     * @param \DCarbone\Camel\Node\ComparisonOperator\IsNotNull $isNotNull
     */
    public function testCanGetIsNotNullNodeName(\DCarbone\Camel\Node\ComparisonOperator\IsNotNull $isNotNull)
    {
        $name = $isNotNull->nodeName();
        $this->assertInternalType('string', $name);
        $this->assertEquals('IsNotNull', $name);
    }
}
