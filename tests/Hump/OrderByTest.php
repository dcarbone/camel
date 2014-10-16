<?php

/**
 * Class OrderByTest
 */
class OrderByTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \DCarbone\Camel\Camel::orderBy
     * @covers \DCarbone\Camel\Hump\OrderBy::__construct
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Hump\AbstractHump
     * @uses \DCarbone\Camel\Hump\OrderBy
     * @return \DCarbone\Camel\Hump\OrderBy
     */
    public function testCanGetOrderByInstance()
    {
        $camel = new \DCarbone\Camel\Camel();

        $orderBy = $camel->orderBy();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Hump\\OrderBy', $orderBy);

        return $orderBy;
    }

    /**
     * @covers \DCarbone\Camel\Hump\OrderBy::nodeName
     * @uses \DCarbone\Camel\Hump\OrderBy
     * @depends testCanGetOrderByInstance
     * @param \DCarbone\Camel\Hump\OrderBy $orderBy
     */
    public function testCanGetNodeName(\DCarbone\Camel\Hump\OrderBy $orderBy)
    {
        $name = $orderBy->nodeName();

        $this->assertInternalType('string', $name);
        $this->assertEquals('OrderBy', $name);
    }

    /**
     * @covers \DCarbone\Camel\Hump\OrderBy::shouldOverride
     * @uses \DCarbone\Camel\Hump\OrderBy
     * @depends testCanGetOrderByInstance
     * @param \DCarbone\Camel\Hump\OrderBy $orderBy
     */
    public function testCanSetShouldOverride(\DCarbone\Camel\Hump\OrderBy $orderBy)
    {
        $end = $orderBy->shouldOverride();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Hump\\OrderBy', $end);
    }

    /**
     * @covers \DCarbone\Camel\Hump\OrderBy::shouldUseIndexForOrderBy
     * @uses \DCarbone\Camel\Hump\OrderBy
     * @depends testCanGetOrderByInstance
     * @param \DCarbone\Camel\Hump\OrderBy $orderBy
     */
    public function testCanSetUseIndexForOrderBy(\DCarbone\Camel\Hump\OrderBy $orderBy)
    {
        $end = $orderBy->shouldUseIndexForOrderBy();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Hump\\OrderBy', $end);
    }

    /**
     * @covers \DCarbone\Camel\Hump\OrderBy::fieldRef
     * @covers \DCarbone\Camel\Hump\AbstractSimpleHump::append
     * @covers \DCarbone\Camel\Node\FieldRef::__construct
     * @covers \DCarbone\Camel\Node\FieldRef::nodeName
     * @covers \DCarbone\Camel\Node\AbstractNode::setParent
     * @covers \DCarbone\Camel\Node\AbstractNode::getValidParents
     * @covers \DCarbone\Camel\Node\AbstractNode::attribute
     * @uses \DCarbone\Camel\Hump\OrderBy
     * @uses \DCarbone\Camel\Hump\AbstractSimpleHump
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\FieldRef
     * @depends testCanGetOrderByInstance
     * @param \DCarbone\Camel\Hump\OrderBy $orderBy
     */
    public function testCanAddFieldRefNode(\DCarbone\Camel\Hump\OrderBy $orderBy)
    {
        $fieldRef = $orderBy->fieldRef('My Great Field');

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\FieldRef', $fieldRef);

        $nodeName = $fieldRef->nodeName();
        $this->assertInternalType('string', $nodeName);
        $this->assertEquals('FieldRef', $nodeName);
    }

    /**
     * @covers \DCarbone\Camel\Hump\OrderBy::__toString
     * @covers \DCarbone\Camel\Node\AbstractNode::__toString
     * @covers \DCarbone\Camel\Node\FieldRef::nodeName
     * @uses \DCarbone\Camel\Hump\OrderBy
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\FieldRef
     * @depends testCanGetOrderByInstance
     * @param \DCarbone\Camel\Hump\OrderBy $orderBy
     */
    public function testCanGetOrderByXMLStringViaTypecasting(\DCarbone\Camel\Hump\OrderBy $orderBy)
    {
        $xml = (string)$orderBy;

        $this->assertInternalType('string', $xml);

        $sxe = new \SimpleXMLElement($xml);

        $this->assertInstanceOf('\\SimpleXMLElement', $sxe);
        $this->assertFalse(libxml_get_last_error());

        $sxe = null;
    }
}
 