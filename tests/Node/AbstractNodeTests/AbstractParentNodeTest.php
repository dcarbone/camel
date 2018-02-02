<?php

/**
 * Class AbstractParentNodeTest
 */
class AbstractParentNodeTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @uses \DCarbone\Camel\Node\Value
     * @return \DCarbone\Camel\Node\AbstractParentNode
     */
    public function testCanConstructParentNode()
    {
        $parentNode = new \DCarbone\Camel\Node\Value();
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\AbstractParentNode', $parentNode);
        return $parentNode;
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractParentNode::getAllowableChildren
     * @uses \DCarbone\Camel\Node\Value
     * @depends testCanConstructParentNode
     * @param \DCarbone\Camel\Node\AbstractParentNode $parentNode
     */
    public function testCanGetListOfAllowableChildren(\DCarbone\Camel\Node\AbstractParentNode $parentNode)
    {
        $allowableChildren = $parentNode->getAllowableChildren();
        $this->assertInternalType('array', $allowableChildren);
        $this->assertGreaterThan(0, count($allowableChildren));
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractParentNode::append
     * @uses \DCarbone\Camel\Node\Value
     * @uses \DCarbone\Camel\Node\ValueNode\XML
     */
    public function testCanAppendAllowableChildNode()
    {
        $value = new \DCarbone\Camel\Node\Value();
        $xml = new \DCarbone\Camel\Node\ValueNode\XML();
        $value->append($xml);

        $this->assertCount(1, $value->children());

        return $value;
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractParentNode::append
     * @uses \DCarbone\Camel\Node\Value
     * @uses \DCarbone\Camel\Node\ComparisonOperator\Eq
     * @expectedException \LogicException
     */
    public function testExceptionThrownWhenAppendingDisallowedChild()
    {
        $value = new \DCarbone\Camel\Node\Value();
        $eq = new \DCarbone\Camel\Node\ComparisonOperator\Eq();
        $value->append($eq);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractParentNode::children
     * @uses \DCarbone\Camel\Node\Value
     * @uses \DCarbone\Camel\Node\ValueNode\XML
     * @depends testCanAppendAllowableChildNode
     * @param \DCarbone\Camel\Node\AbstractParentNode $parentNode
     */
    public function testCanGetChildNodes(\DCarbone\Camel\Node\AbstractParentNode $parentNode)
    {
        $children = $parentNode->children();
        $this->assertInternalType('array', $children);
        $this->assertCount(1, $children);
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\AbstractNode', $children[0]);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::__toString
     * @uses \DCarbone\Camel\Node\Value
     * @uses \DCarbone\Camel\Node\ValueNode\XML
     * @depends testCanAppendAllowableChildNode
     * @param \DCarbone\Camel\Node\AbstractParentNode $parentNode
     */
    public function testCanTypeCastToValidXMLStringWithChildNodes(\DCarbone\Camel\Node\AbstractParentNode $parentNode)
    {
        $xml = (string)$parentNode;
        $this->assertInternalType('string', $xml);
        $this->assertEquals("<Value><XML></XML>\n</Value>", trim($xml));

        $sxe = @new \SimpleXMLElement($xml);
        $this->assertInstanceOf('\\SimpleXMLElement', $sxe);
    }
}
