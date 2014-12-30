<?php

/**
 * Class AbstractNodeTest
 */
class AbstractNodeTest extends PHPUnit_Framework_TestCase
{
    /**
     * @uses   \DCarbone\Camel\Node\FieldRef
     * @return \DCarbone\Camel\Node\AbstractNode
     */
    public function testCanConstructNode()
    {
        $node = new \DCarbone\Camel\Node\FieldRef();
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\AbstractNode', $node);
        return $node;
    }

    /**
     * @covers  \DCarbone\Camel\Node\Abstractnode::getAllowableParents
     * @depends testCanConstructNode
     * @param \DCarbone\Camel\Node\AbstractNode $node
     */
    public function testCanGetListOfAllowableParents(\DCarbone\Camel\Node\AbstractNode $node)
    {
        $allowableParents = $node->getAllowableParents();
        $this->assertInternalType('array', $allowableParents);
        $this->assertGreaterThan(0, count($allowableParents));
    }

    /**
     * @covers  \DCarbone\Camel\Node\AbstractNode::getAllowableAttributes
     * @depends testCanConstructNode
     * @param \DCarbone\Camel\Node\AbstractNode $node
     */
    public function testCanGetListOfAllowableAttributes(\DCarbone\Camel\Node\AbstractNode $node)
    {
        $allowableAttributes = $node->getAllowableAttributes();
        $this->assertInternalType('array', $allowableAttributes);
        $this->assertGreaterThan(0, count($allowableAttributes));
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractParentNode::append
     * @covers \DCarbone\Camel\Node\AbstractNode::setParent
     * @uses \DCarbone\Camel\Node\FieldRef
     * @uses \DCarbone\Camel\Node\ComparisonOperator\Eq
     * @return \DCarbone\Camel\Node\AbstractNode
     */
    public function testCanAssignAllowableParentNode()
    {
        $eq = new \DCarbone\Camel\Node\ComparisonOperator\Eq();
        $fieldRef = new \DCarbone\Camel\Node\FieldRef();
        $eq->append($fieldRef);

        return $fieldRef;
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::setParent
     * @uses \DCarbone\Camel\Node\FieldRef
     * @uses \DCarbone\Camel\Node\Value
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionThrownWhenAssigningParentNotInAllowableParentArray()
    {
        $value = new \DCarbone\Camel\Node\Value();
        $fieldRef = new \DCarbone\Camel\Node\FieldRef();
        $fieldRef->setParent($value);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::end
     * @uses \DCarbone\Camel\Node\FieldRef
     * @uses \DCarbone\Camel\Node\ComparisonOperator\Eq
     * @depends testCanAssignAllowableParentNode
     * @param \DCarbone\Camel\Node\AbstractNode $node
     */
    public function testCanGetParentNodeFromChild(\DCarbone\Camel\Node\AbstractNode $node)
    {
        $parent = $node->end();
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Eq', $parent);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::setParent
     * @uses \DCarbone\Camel\Node\FieldRef
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionThrownWhenAssigningNonNodeParent()
    {
        $fieldRef = new \DCarbone\Camel\Node\FieldRef();
        $fieldRef->setParent('');
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::attribute
     * @uses \DCarbone\Camel\Node\FieldRef
     */
    public function testCanSetAllowableAttribute()
    {
        $fieldRef = new \DCarbone\Camel\Node\FieldRef();
        $fieldRef->attribute('type', 'Test');
        $this->assertEquals('<FieldRef Type="Test" />', trim((string)$fieldRef));
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::attribute
     * @uses \DCarbone\Camel\Node\FieldRef
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionThrownWhenAssigningAttributeNotInAllowableAttributeArray()
    {
        $fieldRef = new \DCarbone\Camel\Node\FieldRef();
        $fieldRef->attribute('sandwiches', 'are yummy');
    }
}
