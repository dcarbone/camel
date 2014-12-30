<?php

/**
 * Class ListPropertyTest
 */
class ListPropertyTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\ValueNode\ListProperty::__construct
     * @uses \DCarbone\Camel\Node\ValueNode\ListProperty
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @return \DCarbone\Camel\Node\ValueNode\ListProperty
     */
    public function testCanInitializeNode()
    {
        $listProperty = new \DCarbone\Camel\Node\ValueNode\ListProperty();
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ValueNode\\ListProperty', $listProperty);
        return $listProperty;
    }

    /**
     * @covers \DCarbone\Camel\Node\ValueNode\ListProperty::nodeName
     * @uses \DCarbone\Camel\Node\ValueNode\ListProperty
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\ValueNode\ListProperty $listProperty
     */
    public function testCanGetNodeName(\DCarbone\Camel\Node\ValueNode\ListProperty $listProperty)
    {
        $name = $listProperty->nodeName();
        $this->assertInternalType('string', $name);
        $this->assertEquals('ListProperty', $name);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::getAllowableAttributes
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\ValueNode\ListProperty
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\ValueNode\ListProperty $listProperty
     */
    public function testCanGetAttributeMap(\DCarbone\Camel\Node\ValueNode\ListProperty $listProperty)
    {
        $attributes = $listProperty->getAllowableAttributes();

        $this->assertInternalType('array', $attributes);
        $this->assertCount(10, $attributes);
        $this->assertContains('AutoHyperLink', $attributes);
        $this->assertContains('AutoHyperLinkNoEncoding', $attributes);
        $this->assertContains('AutoNewLine', $attributes);
        $this->assertContains('Default', $attributes);
        $this->assertContains('ExpandXML', $attributes);
        $this->assertContains('HTMLEncode', $attributes);
        $this->assertContains('Select', $attributes);
        $this->assertContains('StripWS', $attributes);
        $this->assertContains('URLEncode', $attributes);
        $this->assertContains('URLEncodeAsURL', $attributes);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::getAllowableParents
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\ValueNode\ListProperty
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\ValueNode\ListProperty $listProperty
     */
    public function testCanGetValidParents(\DCarbone\Camel\Node\ValueNode\ListProperty $listProperty)
    {
        $parents = $listProperty->getAllowableParents();

        $this->assertInternalType('array', $parents);
        $this->assertCount(1, $parents);
        $this->assertContains('Value', $parents);
    }
}
 