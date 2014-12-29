<?php

/**
 * Class GroupByTest
 */
class GroupByTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \DCarbone\Camel\Camel::orderBy
     * @covers \DCarbone\Camel\Hump\GroupBy::__construct
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Hump\AbstractHump
     * @uses \DCarbone\Camel\Hump\GroupBy
     * @return \DCarbone\Camel\Hump\GroupBy
     */
    public function testCanGetGroupByInstance()
    {
        $camel = new \DCarbone\Camel\Camel();

        $groupBy = $camel->groupBy();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Hump\\GroupBy', $groupBy);

        return $groupBy;
    }

    /**
     * @covers \DCarbone\Camel\Hump\GroupBy::nodeName
     * @uses \DCarbone\Camel\Hump\GroupBy
     * @depends testCanGetGroupByInstance
     * @param \DCarbone\Camel\Hump\GroupBy $groupBy
     */
    public function testCanGetNodeName(\DCarbone\Camel\Hump\GroupBy $groupBy)
    {
        $name = $groupBy->nodeName();

        $this->assertInternalType('string', $name);
        $this->assertEquals('GroupBy', $name);
    }

    /**
     * @covers \DCarbone\Camel\Hump\GroupBy::shouldCollapse
     * @uses \DCarbone\Camel\Hump\GroupBy
     * @depends testCanGetGroupByInstance
     * @param \DCarbone\Camel\Hump\GroupBy $groupBy
     */
    public function testCanSetCollapse(\DCarbone\Camel\Hump\GroupBy $groupBy)
    {
        $end = $groupBy->shouldCollapse();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Hump\\GroupBy', $end);
    }

    /**
     * @covers \DCarbone\Camel\Hump\GroupBy::fieldRef
     * @covers \DCarbone\Camel\Hump\AbstractSimpleHump::append
     * @covers \DCarbone\Camel\Node\FieldRef::__construct
     * @covers \DCarbone\Camel\Node\FieldRef::nodeName
     * @covers \DCarbone\Camel\Node\AbstractNode::setParent
     * @covers \DCarbone\Camel\Node\AbstractNode::getAllowableParents
     * @covers \DCarbone\Camel\Node\AbstractNode::attribute
     * @uses \DCarbone\Camel\Hump\GroupBy
     * @uses \DCarbone\Camel\Hump\AbstractSimpleHump
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\FieldRef
     * @depends testCanGetGroupByInstance
     * @param \DCarbone\Camel\Hump\GroupBy $groupBy
     */
    public function testCanAddFieldRefNode(\DCarbone\Camel\Hump\GroupBy $groupBy)
    {
        $fieldRef = $groupBy->fieldRef('My Great Field');

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\FieldRef', $fieldRef);

        $nodeName = $fieldRef->nodeName();
        $this->assertInternalType('string', $nodeName);
        $this->assertEquals('FieldRef', $nodeName);
    }

    /**
     * @covers \DCarbone\Camel\Hump\GroupBy::__toString
     * @covers \DCarbone\Camel\Node\AbstractNode::__toString
     * @covers \DCarbone\Camel\Node\FieldRef::nodeName
     * @uses \DCarbone\Camel\Hump\GroupBy
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\FieldRef
     * @depends testCanGetGroupByInstance
     * @param \DCarbone\Camel\Hump\GroupBy $groupBy
     */
    public function testCanGetGroupByXMLStringViaTypecasting(\DCarbone\Camel\Hump\GroupBy $groupBy)
    {
        $xml = (string)$groupBy;

        $this->assertInternalType('string', $xml);

        $sxe = new \SimpleXMLElement($xml);

        $this->assertInstanceOf('\\SimpleXMLElement', $sxe);
        $this->assertFalse(libxml_get_last_error());

        $sxe = null;
    }
}
 