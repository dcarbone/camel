<?php

/**
 * Class NowTest
 */
class NowTest extends PHPUnit_Framework_TestCase
{
    /**
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\ValueNode\Now
     * @return \DCarbone\Camel\Node\ValueNode\Now
     */
    public function testCanInitializeNode()
    {
        $now = new \DCarbone\Camel\Node\ValueNode\Now();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ValueNode\\Now', $now);

        return $now;
    }

    /**
     * @covers \DCarbone\Camel\Node\ValueNode\Now::nodeName
     * @uses \DCarbone\Camel\Node\ValueNode\Now
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\ValueNode\Now $now
     */
    public function testCanGetNodeName(\DCarbone\Camel\Node\ValueNode\Now $now)
    {
        $name = $now->nodeName();

        $this->assertInternalType('string', $name);
        $this->assertEquals('Now', $name);
    }
}
 