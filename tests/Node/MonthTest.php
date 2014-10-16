<?php

/**
 * Class MonthTest
 */
class MonthTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\Month::__construct
     * @uses \DCarbone\Camel\Node\Month
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @return \DCarbone\Camel\Node\Month
     */
    public function testCanInitializeNode()
    {
        $month = new \DCarbone\Camel\Node\Month();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\Month', $month);

        return $month;
    }

    /**
     * @covers \DCarbone\Camel\Node\Month::nodeName
     * @uses \DCarbone\Camel\Node\Month
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\Month $month
     */
    public function testCanGetNodeName(\DCarbone\Camel\Node\Month $month)
    {
        $name = $month->nodeName();

        $this->assertInternalType('string', $name);

        $this->assertEquals('Month', $name);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::getValidParents
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\Month
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\Month $month
     */
    public function testCanGetValidParents(\DCarbone\Camel\Node\Month $month)
    {
        $parents = $month->getValidParents();

        $this->assertInternalType('array', $parents);
        $this->assertCount(1, $parents);
        $this->assertContains('Value', $parents);
    }

    /**
     * @covers \DCarbone\Camel\Node\Month::setNodeTextValue
     * @covers \DCarbone\Camel\Node\Month::getNodeTextValue
     * @uses \DCarbone\Camel\Node\Month
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\Month $month
     */
    public function testCanSetNodeTextValue(\DCarbone\Camel\Node\Month $month)
    {
        $ret = $month->setNodeTextValue('TestValue');

        $this->assertSame($month, $ret);

        $textValue = $month->getNodeTextValue();

        $this->assertInternalType('string', $textValue);
        $this->assertEquals('TestValue', $textValue);
    }
}
 