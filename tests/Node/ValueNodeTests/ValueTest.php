<?php

/**
 * Class ValueTest
 */
class ValueTest extends \PHPUnit\Framework\TestCase
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
     * @covers \DCarbone\Camel\Node\Value::nodeValue
     * @covers \DCarbone\Camel\Node\Value::getNodeValue
     * @uses \DCarbone\Camel\Node\Value
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\Value $value
     */
    public function testCanSetNodeTextValue(\DCarbone\Camel\Node\Value $value)
    {
        $ret = $value->nodeValue('TestValue');

        $this->assertSame($value, $ret);

        $textValue = $value->getNodeValue();

        $this->assertInternalType('string', $textValue);
        $this->assertEquals('TestValue', $textValue);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::getAllowableParents
     * @uses \DCarbone\Camel\Node\Value
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\AbstractParentNode
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\Value $value
     */
    public function testCanGetValidParents(\DCarbone\Camel\Node\Value $value)
    {
        $parents = $value->getAllowableParents();

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
     * @covers \DCarbone\Camel\Node\AbstractNode::getAllowableAttributes
     * @uses \DCarbone\Camel\Node\Value
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\Value $value
     */
    public function testCanGetValidAttributes(\DCarbone\Camel\Node\Value $value)
    {
        $attributes = $value->getAllowableAttributes();

        $this->assertInternalType('array', $attributes);
        $this->assertCount(2, $attributes);
        $this->assertContains('Type', $attributes);
        $this->assertContains('IncludeTimeValue', $attributes);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractParentNode::getAllowableChildren
     * @uses \DCarbone\Camel\Node\Value
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\Value $value
     */
    public function testCanGetValidChildren(\DCarbone\Camel\Node\Value $value)
    {
        $children = $value->getAllowableChildren();

        $this->assertInternalType('array', $children);
        $this->assertCount(6, $children);
        $this->assertContains('ListProperty', $children);
        $this->assertContains('Month', $children);
        $this->assertContains('Now', $children);
        $this->assertContains('Today', $children);
        $this->assertContains('UserID', $children);
        $this->assertContains('XML', $children);
    }

    /**
     * @covers \DCarbone\Camel\Node\Value::month
     * @covers \DCarbone\Camel\Node\AbstractParentNode::append
     * @uses \DCarbone\Camel\Node\AbstractParentNode
     * @uses \DCarbone\Camel\Node\Value
     * @uses \DCarbone\Camel\Node\ValueNode\Month
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\Value $value
     */
    public function testCanCreateMonthChild(\DCarbone\Camel\Node\Value $value)
    {
        $month = $value->month();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ValueNode\\Month', $month);
    }

    /**
     * @covers \DCarbone\Camel\Node\Value::now
     * @covers \DCarbone\Camel\Node\AbstractParentNode::append
     * @uses \DCarbone\Camel\Node\ValueNode\Now
     * @uses \DCarbone\Camel\Node\Value
     * @uses \DCarbone\Camel\Node\AbstractParentNode
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\Value $value
     */
    public function testCanCreateNowChild(\DCarbone\Camel\Node\Value $value)
    {
        $now = $value->now();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ValueNode\\Now', $now);
    }

    /**
     * @covers \DCarbone\Camel\Node\Value::listProperty
     * @covers \DCarbone\Camel\Node\AbstractParentNode::append
     * @uses \DCarbone\Camel\Node\ValueNode\ListProperty
     * @uses \DCarbone\Camel\Node\Value
     * @uses \DCarbone\Camel\Node\AbstractParentNode
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\Value $value
     */
    public function testCanCreateListPropertyChild(\DCarbone\Camel\Node\Value $value)
    {
        $listProperty = $value->listProperty();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ValueNode\\ListProperty', $listProperty);
    }

    /**
     * @covers \DCarbone\Camel\Node\Value::today
     * @covers \DCarbone\Camel\Node\AbstractParentNode::append
     * @uses \DCarbone\Camel\Node\ValueNode\Today
     * @uses \DCarbone\Camel\Node\Value
     * @uses \DCarbone\Camel\Node\AbstractParentNode
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\Value $value
     */
    public function testCanCreateTodayChild(\DCarbone\Camel\Node\Value $value)
    {
        $today = $value->today();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ValueNode\\Today', $today);
    }

    /**
     * @covers \DCarbone\Camel\Node\Value::userID
     * @covers \DCarbone\Camel\Node\AbstractParentNode::append
     * @uses \DCarbone\Camel\Node\ValueNode\UserID
     * @uses \DCarbone\Camel\Node\Value
     * @uses \DCarbone\Camel\Node\AbstractParentNode
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\Value $value
     */
    public function testCanCreateUserIDChild(\DCarbone\Camel\Node\Value $value)
    {
        $userID = $value->userID();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ValueNode\\UserID', $userID);
    }

    /**
     * @covers \DCarbone\Camel\Node\Value::xml
     * @covers \DCarbone\Camel\Node\AbstractParentNode::append
     * @uses \DCarbone\Camel\Node\ValueNode\XML
     * @uses \DCarbone\Camel\Node\Value
     * @uses \DCarbone\Camel\Node\AbstractParentNode
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\Value $value
     */
    public function testCanCreateXMLChild(\DCarbone\Camel\Node\Value $value)
    {
        $xml = $value->xml();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ValueNode\\XML', $xml);
    }
}
 