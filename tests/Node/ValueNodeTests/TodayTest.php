<?php

/**
 * Class TodayTest
 */
class TodayTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\ValueNode\Today::__construct
     * @uses \DCarbone\Camel\Node\ValueNode\Today
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @return \DCarbone\Camel\Node\ValueNode\Today
     */
    public function testCanInitializeNode()
    {
        $today = new \DCarbone\Camel\Node\ValueNode\Today();
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ValueNode\\Today', $today);
        return $today;
    }

    /**
     * @covers \DCarbone\Camel\Node\ValueNode\Today::nodeName
     * @uses \DCarbone\Camel\Node\ValueNode\Today
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\ValueNode\Today $today
     */
    public function testCanGetNodeName(\DCarbone\Camel\Node\ValueNode\Today $today)
    {
        $name = $today->nodeName();
        $this->assertInternalType('string', $name);
        $this->assertEquals('Today', $name);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::getAllowableAttributes
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\ValueNode\Today
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\ValueNode\Today $today
     */
    public function testCanGetValidAttributes(\DCarbone\Camel\Node\ValueNode\Today $today)
    {
        $attributes = $today->getAllowableAttributes();

        $this->assertInternalType('array', $attributes);
        $this->assertCount(1, $attributes);
        $this->assertContains('Offset', $attributes);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::getAllowableParents
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\ValueNode\Today
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\ValueNode\Today $today
     */
    public function testCanGetValidParents(\DCarbone\Camel\Node\ValueNode\Today $today)
    {
        $parents = $today->getAllowableParents();

        $this->assertInternalType('array', $parents);
        $this->assertCount(1, $parents);
        $this->assertContains('Value', $parents);
    }
}
 