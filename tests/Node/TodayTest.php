<?php

/**
 * Class TodayTest
 */
class TodayTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\Today::__construct
     * @uses \DCarbone\Camel\Node\Today
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @return \DCarbone\Camel\Node\Today
     */
    public function testCanInitializeNode()
    {
        $today = new \DCarbone\Camel\Node\Today();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\Today', $today);

        return $today;
    }

    /**
     * @covers \DCarbone\Camel\Node\Today::nodeName
     * @uses \DCarbone\Camel\Node\Today
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\Today $today
     */
    public function testCanGetNodeName(\DCarbone\Camel\Node\Today $today)
    {
        $name = $today->nodeName();

        $this->assertInternalType('string', $name);

        $this->assertEquals('Today', $name);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::getValidAttributes
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\Today
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\Today $today
     */
    public function testCanGetValidAttributes(\DCarbone\Camel\Node\Today $today)
    {
        $attributes = $today->getValidAttributes();

        $this->assertInternalType('array', $attributes);
        $this->assertCount(1, $attributes);
        $this->assertContains('Offset', $attributes);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::getValidParents
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\Today
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\Today $today
     */
    public function testCanGetValidParents(\DCarbone\Camel\Node\Today $today)
    {
        $parents = $today->getValidParents();

        $this->assertInternalType('array', $parents);
        $this->assertCount(1, $parents);
        $this->assertContains('Value', $parents);
    }
}
 