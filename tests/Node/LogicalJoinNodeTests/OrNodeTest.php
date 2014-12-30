<?php

/**
 * Class OrNodeTest
 */
class OrNodeTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode::__construct
     * @uses \DCarbone\Camel\Node\LogicalJoin\OrNode
     * @return \DCarbone\Camel\Node\LogicalJoin\OrNode
     */
    public function testCanInitializeOrNode()
    {
        $orNode = new \DCarbone\Camel\Node\LogicalJoin\OrNode();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\LogicalJoin\\OrNode', $orNode);

        return $orNode;
    }

    /**
     * @covers \DCarbone\Camel\Node\LogicalJoin\OrNode::nodeName
     * @uses \DCarbone\Camel\Node\LogicalJoin\OrNode
     * @depends testCanInitializeOrNode
     * @param \DCarbone\Camel\Node\LogicalJoin\OrNode $orNode
     */
    public function testCanGetOrNodeName(\DCarbone\Camel\Node\LogicalJoin\OrNode $orNode)
    {
        $name = $orNode->nodeName();

        $this->assertInternalType('string', $name);
        $this->assertEquals('Or', $name);
    }
}
