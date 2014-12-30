<?php

/**
 * Class FieldRefTest
 */
class FieldRefTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\FieldRef::__construct
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\FieldRef
     * @return \DCarbone\Camel\Node\FieldRef
     */
    public function testCanInitializeFieldRefNode()
    {
        $fieldRef = new \DCarbone\Camel\Node\FieldRef();
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\FieldRef', $fieldRef);

        return $fieldRef;
    }

    /**
     * @covers \DCarbone\Camel\Node\FieldRef::nodeName
     * @uses \DCarbone\Camel\Node\FieldRef
     * @depends testCanInitializeFieldRefNode
     * @param \DCarbone\Camel\Node\FieldRef $fieldRef
     */
    public function testCanGetFieldRefNodeName(\DCarbone\Camel\Node\FieldRef $fieldRef)
    {
        $name = $fieldRef->nodeName();
        $this->assertInternalType('string', $name);
        $this->assertEquals('FieldRef', $name);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::getAllowableAttributes
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\FieldRef
     * @depends testCanInitializeFieldRefNode
     * @param \DCarbone\Camel\Node\FieldRef $fieldRef
     */
    public function testHasCorrectAllowableAttributes(\DCarbone\Camel\Node\FieldRef $fieldRef)
    {
        $attributes = $fieldRef->getAllowableAttributes();

        $this->assertInternalType('array', $attributes);
        $this->assertCount(15, $attributes);
        $this->assertContains('Alias', $attributes);
        $this->assertContains('Ascending', $attributes);
        $this->assertContains('CreateURL', $attributes);
        $this->assertContains('DisplayName', $attributes);
        $this->assertContains('Explicit', $attributes);
        $this->assertContains('Format', $attributes);
        $this->assertContains('ID', $attributes);
        $this->assertContains('Key', $attributes);
        $this->assertContains('List', $attributes);
        $this->assertContains('LookupId', $attributes);
        $this->assertContains('Name', $attributes);
        $this->assertContains('RefType', $attributes);
        $this->assertContains('ShowField', $attributes);
        $this->assertContains('TextOnly', $attributes);
        $this->assertContains('Type', $attributes);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::getAllowableParents
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\FieldRef
     * @depends testCanInitializeFieldRefNode
     * @param \DCarbone\Camel\Node\FieldRef $fieldRef
     */
    public function testHasCorrectAllowableParents(\DCarbone\Camel\Node\FieldRef $fieldRef)
    {
        $parents = $fieldRef->getAllowableParents();

        $this->assertInternalType('array', $parents);
        $this->assertCount(17, $parents);
        $this->assertContains('BeginsWith', $parents);
        $this->assertContains('Contains', $parents);
        $this->assertContains('DateRangesOverlap', $parents);
        $this->assertContains('Eq', $parents);
        $this->assertContains('FieldRefs', $parents);
        $this->assertContains('Geq', $parents);
        $this->assertContains('GroupBy', $parents);
        $this->assertContains('Gt', $parents);
        $this->assertContains('In', $parents);
        $this->assertContains('Includes', $parents);
        $this->assertContains('IsNotNull', $parents);
        $this->assertContains('IsNull', $parents);
        $this->assertContains('Leq', $parents);
        $this->assertContains('Lt', $parents);
        $this->assertContains('Neq', $parents);
        $this->assertContains('NotIncludes', $parents);
        $this->assertContains('OrderBy', $parents);
    }
}
 