<?php

/**
 * Class AndNodeTest
 */
class AndNodeTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\LogicalJoin\AbstractLogicalJoinNode::__construct
     * @uses \DCarbone\Camel\Node\LogicalJoin\AndNode
     * @returns \DCarbone\Camel\Node\LogicalJoin\AndNode
     */
    public function testCanInitializeAndNode()
    {
        $andNode = new \DCarbone\Camel\Node\LogicalJoin\AndNode();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\LogicalJoin\\AndNode', $andNode);

        return $andNode;
    }

    /**
     * @covers \DCarbone\Camel\Node\LogicalJoin\AndNode::nodeName
     * @uses \DCarbone\Camel\Node\LogicalJoin\AndNode
     * @depends testCanInitializeAndNode
     * @param \DCarbone\Camel\Node\LogicalJoin\AndNode $andNode
     */
    public function testCanGetAndNodeName(\DCarbone\Camel\Node\LogicalJoin\AndNode $andNode)
    {
        $name = $andNode->nodeName();

        $this->assertInternalType('string', $name);
        $this->assertEquals('And', $name);
    }
}
