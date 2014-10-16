<?php

/**
 * Class AndNodeTest
 */
class AndNodeTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode::__construct
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\AbstractParentNode
     * @uses \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode
     * @uses \DCarbone\Camel\Node\LogicalJoin\AndNode
     * @returns \DCarbone\Camel\Node\logicalJoin\AndNode
     */
    public function testCanInitializeNode()
    {
        $andNode = new \DCarbone\Camel\Node\LogicalJoin\AndNode();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\LogicalJoin\\AndNode', $andNode);

        return $andNode;
    }

    /**
     * @covers \DCarbone\Camel\Node\LogicalJoin\AndNode::nodeName
     * @uses \DCarbone\Camel\Node\LogicalJoin\AndNode
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\LogicalJoin\AndNode $andNode
     */
    public function testCanGetNodeName(\DCarbone\Camel\Node\LogicalJoin\AndNode $andNode)
    {
        $name = $andNode->nodeName();

        $this->assertInternalType('string', $name);
        $this->assertEquals('And', $name);
    }
}
 