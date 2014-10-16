<?php

/**
 * Class UserIDTest
 */
class UserIDTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\UserID::__construct
     * @uses \DCarbone\Camel\Node\UserID
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @return \DCarbone\Camel\Node\UserID
     */
    public function testCanInitializeNode()
    {
        $userID = new \DCarbone\Camel\Node\UserID();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\UserID', $userID);

        return $userID;
    }

    /**
     * @covers \DCarbone\Camel\Node\UserID::nodeName
     * @uses \DCarbone\Camel\Node\UserID
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\UserID $userID
     */
    public function testCanGetNodeName(\DCarbone\Camel\Node\UserID $userID)
    {
        $name = $userID->nodeName();

        $this->assertInternalType('string', $name);
        $this->assertEquals('UserID', $name);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::getValidParents
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\UserID
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\UserID $userID
     */
    public function testCanGetValidParents(\DCarbone\Camel\Node\UserID $userID)
    {
        $parents = $userID->getValidParents();

        $this->assertInternalType('array', $parents);
        $this->assertCount(1, $parents);
        $this->assertContains('Value', $parents);
    }

    /**
     * @covers \DCarbone\Camel\Node\UserID::setNodeTextValue
     * @covers \DCarbone\Camel\Node\UserID::getNodeTextValue
     * @uses \DCarbone\Camel\Node\UserID
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\UserID $userID
     */
    public function testCanSetNodeTextValue(\DCarbone\Camel\Node\UserID $userID)
    {
        $ret = $userID->setNodeTextValue('TestValue');

        $this->assertSame($userID, $ret);

        $textValue = $userID->getNodeTextValue();

        $this->assertInternalType('string', $textValue);
        $this->assertEquals('TestValue', $textValue);
    }
}
 