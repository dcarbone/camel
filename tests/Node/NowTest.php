<?php

/**
 * Class NowTest
 */
class NowTest extends PHPUnit_Framework_TestCase
{
    /**
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\Now
     * @return \DCarbone\Camel\Node\Now
     */
    public function testCanInitializeNode()
    {
        $now = new \DCarbone\Camel\Node\Now();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\Now', $now);

        return $now;
    }

    /**
     * @covers \DCarbone\Camel\Node\Now::nodeName
     * @uses \DCarbone\Camel\Node\Now
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\Now $now
     */
    public function testCanGetNodeName(\DCarbone\Camel\Node\Now $now)
    {
        $name = $now->nodeName();

        $this->assertInternalType('string', $name);
        $this->assertEquals('Now', $name);
    }
}
 