<?php

/**
 * Class ListPropertyTest
 */
class ListPropertyTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\ListProperty::__construct
     * @uses \DCarbone\Camel\Node\ListProperty
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @return \DCarbone\Camel\Node\ListProperty
     */
    public function testCanInitializeNode()
    {
        $listProperty = new \DCarbone\Camel\Node\ListProperty();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ListProperty', $listProperty);

        return $listProperty;
    }

    /**
     * @covers \DCarbone\Camel\Node\ListProperty::nodeName
     * @uses \DCarbone\Camel\Node\ListProperty
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\ListProperty $listProperty
     */
    public function testCanGetNodeName(\DCarbone\Camel\Node\ListProperty $listProperty)
    {
        $name = $listProperty->nodeName();

        $this->assertInternalType('string', $name);

        $this->assertEquals('ListProperty', $name);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::getValidAttributes
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\ListProperty
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\ListProperty $listProperty
     */
    public function testCanGetAttributeMap(\DCarbone\Camel\Node\ListProperty $listProperty)
    {
        $attributes = $listProperty->getValidAttributes();

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
     * @covers \DCarbone\Camel\Node\AbstractNode::getValidParents
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\ListProperty
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\ListProperty $listProperty
     */
    public function testCanGetValidParents(\DCarbone\Camel\Node\ListProperty $listProperty)
    {
        $parents = $listProperty->getValidParents();

        $this->assertInternalType('array', $parents);
        $this->assertCount(1, $parents);
        $this->assertContains('Value', $parents);
    }
}
 