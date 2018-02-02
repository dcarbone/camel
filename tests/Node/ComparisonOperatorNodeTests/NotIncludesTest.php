<?php

/**
 * Class NotIncludesTest
 */
class NotIncludesTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode::__construct
     * @covers \DCarbone\Camel\Node\ComparisonOperator\NotIncludes::__construct
     * @return \DCarbone\Camel\Node\ComparisonOperator\NotIncludes
     */
    public function testCanConstructNotIncludesNode()
    {
        $node = new \DCarbone\Camel\Node\ComparisonOperator\NotIncludes();
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\NotIncludes', $node);
        return $node;
    }

    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\NotIncludes::nodeName
     * @depends testCanConstructNotIncludesNode
     * @param \DCarbone\Camel\Node\ComparisonOperator\NotIncludes $notIncludes
     */
    public function testCanGetNotIncludesNodeName(\DCarbone\Camel\Node\ComparisonOperator\NotIncludes $notIncludes)
    {
        $name = $notIncludes->nodeName();
        $this->assertInternalType('string', $name);
        $this->assertEquals('NotIncludes', $name);
    }
}
