<?php

/**
 * Class MonthTest
 */
class MonthTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\ValueNode\Month::__construct
     * @uses \DCarbone\Camel\Node\ValueNode\Month
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @return \DCarbone\Camel\Node\ValueNode\Month
     */
    public function testCanInitializeNode()
    {
        $month = new \DCarbone\Camel\Node\ValueNode\Month();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ValueNode\\Month', $month);

        return $month;
    }

    /**
     * @covers \DCarbone\Camel\Node\ValueNode\Month::nodeName
     * @uses \DCarbone\Camel\Node\ValueNode\Month
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\ValueNode\Month $month
     */
    public function testCanGetNodeName(\DCarbone\Camel\Node\ValueNode\Month $month)
    {
        $name = $month->nodeName();

        $this->assertInternalType('string', $name);

        $this->assertEquals('Month', $name);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::getAllowableParents
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\ValueNode\Month
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\ValueNode\Month $month
     */
    public function testCanGetValidParents(\DCarbone\Camel\Node\ValueNode\Month $month)
    {
        $parents = $month->getAllowableParents();

        $this->assertInternalType('array', $parents);
        $this->assertCount(1, $parents);
        $this->assertContains('Value', $parents);
    }

    /**
     * @covers \DCarbone\Camel\Node\ValueNode\Month::nodeValue
     * @covers \DCarbone\Camel\Node\ValueNode\Month::getNodeValue
     * @uses \DCarbone\Camel\Node\ValueNode\Month
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\ValueNode\Month $month
     */
    public function testCanSetNodeTextValue(\DCarbone\Camel\Node\ValueNode\Month $month)
    {
        $ret = $month->nodeValue('TestValue');

        $this->assertSame($month, $ret);

        $textValue = $month->getNodeValue();

        $this->assertInternalType('string', $textValue);
        $this->assertEquals('TestValue', $textValue);
    }
}
 