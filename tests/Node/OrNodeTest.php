<?php

/**
 * Class OrNodeTest
 */
class OrNodeTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode::__construct
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\AbstractParentNode
     * @uses \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode
     * @uses \DCarbone\Camel\Node\LogicalJoin\AndNode
     * @return \DCarbone\Camel\Node\LogicalJoin\OrNode
     */
    public function testCanInitializeNode()
    {
        $orNode = new \DCarbone\Camel\Node\LogicalJoin\OrNode();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\LogicalJoin\\OrNode', $orNode);

        return $orNode;
    }

    /**
     * @covers \DCarbone\Camel\Node\LogicalJoin\OrNode::nodeName
     * @uses \DCarbone\Camel\Node\LogicalJoin\OrNode
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\LogicalJoin\OrNode $orNode
     */
    public function testCanGetNodeName(\DCarbone\Camel\Node\LogicalJoin\OrNode $orNode)
    {
        $name = $orNode->nodeName();

        $this->assertInternalType('string', $name);
        $this->assertEquals('Or', $name);
    }
}
 