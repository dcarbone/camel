<?php

/**
 * Class IncludesTest
 */
class IncludesTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode::__construct
     * @covers \DCarbone\Camel\Node\ComparisonOperator\Includes::__construct
     * @return \DCarbone\Camel\Node\ComparisonOperator\Includes
     */
    public function testCanConstructIncludesNode()
    {
        $node = new \DCarbone\Camel\Node\ComparisonOperator\Includes();
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Includes', $node);
        return $node;
    }

    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\Includes::nodeName
     * @depends testCanConstructIncludesNode
     * @param \DCarbone\Camel\Node\ComparisonOperator\Includes $includes
     */
    public function testCanGetIncludesNodeName(\DCarbone\Camel\Node\ComparisonOperator\Includes $includes)
    {
        $name = $includes->nodeName();
        $this->assertInternalType('string', $name);
        $this->assertEquals('Includes', $name);
    }
}
