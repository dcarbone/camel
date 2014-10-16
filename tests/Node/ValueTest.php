<?php

/**
 * Class ValueTest
 */
class ValueTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\Value::__construct
     * @uses \DCarbone\Camel\Node\Value
     * @return \DCarbone\Camel\Node\Value
     */
    public function testCanInitializeNode()
    {
        $value = new \DCarbone\Camel\Node\Value();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\Value', $value);

        return $value;
    }

    /**
     * @covers \DCarbone\Camel\Node\Value::nodeName
     * @uses \DCarbone\Camel\Node\Value
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\Value $value
     */
    public function testCanGetNodeName(\DCarbone\Camel\Node\Value $value)
    {
        $name = $value->nodeName();

        $this->assertInternalType('string', $name);
        $this->assertEquals('Value', $name);
    }

    /**
     * @covers \DCarbone\Camel\Node\Value::setNodeTextValue
     * @covers \DCarbone\Camel\Node\Value::getNodeTextValue
     * @uses \DCarbone\Camel\Node\Value
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\Value $value
     */
    public function testCanSetNodeTextValue(\DCarbone\Camel\Node\Value $value)
    {
        $ret = $value->setNodeTextValue('TestValue');

        $this->assertSame($value, $ret);

        $textValue = $value->getNodeTextValue();

        $this->assertInternalType('string', $textValue);
        $this->assertEquals('TestValue', $textValue);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::getValidParents
     * @uses \DCarbone\Camel\Node\Value
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\AbstractParentNode
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\Value $value
     */
    public function testCanGetValidParents(\DCarbone\Camel\Node\Value $value)
    {
        $parents = $value->getValidParents();

        $this->assertInternalType('array', $parents);
        $this->assertCount(13, $parents);
        $this->assertContains('BeginsWith', $parents);
        $this->assertContains('Contains', $parents);
        $this->assertContains('DateRangesOverlap', $parents);
        $this->assertContains('Eq', $parents);
        $this->assertContains('Geq', $parents);
        $this->assertContains('Gt', $parents);
        $this->assertContains('Includes', $parents);
        $this->assertContains('IsNotNull', $parents);
        $this->assertContains('Leq', $parents);
        $this->assertContains('Lt', $parents);
        $this->assertContains('Neq', $parents);
        $this->assertContains('NotIncludes', $parents);
        $this->assertContains('Values', $parents);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::getValueAttributes
     * @uses \DCarbone\Camel\Node\Value
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\Value $value
     */
    public function testCanGetValidAttributes(\DCarbone\Camel\Node\Value $value)
    {
        $attributes = $value->getValidAttributes();

        $this->assertInternalType('array', $attributes);
        $this->assertCount(2, $attributes);
        $this->assertContains('Type', $attributes);
        $this->assertContains('IncludeTimeValue', $attributes);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractParentNode::getValidChildren
     * @uses \DCarbone\Camel\Node\Value
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\Value $value
     */
    public function testCanGetValidChildren(\DCarbone\Camel\Node\Value $value)
    {
        $children = $value->getValidChildren();

        $this->assertInternalType('array', $children);
        $this->assertCount(6, $children);
        $this->assertContains('ListProperty', $children);
        $this->assertContains('Month', $children);
        $this->assertContains('Now', $children);
        $this->assertContains('Today', $children);
        $this->assertContains('UserID', $children);
        $this->assertContains('XML', $children);
    }
}
 