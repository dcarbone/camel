<?php

/**
 * Class UserIDTest
 */
class UserIDTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\ValueNode\UserID::__construct
     * @uses \DCarbone\Camel\Node\ValueNode\UserID
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @return \DCarbone\Camel\Node\ValueNode\UserID
     */
    public function testCanInitializeNode()
    {
        $userID = new \DCarbone\Camel\Node\ValueNode\UserID();
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ValueNode\\UserID', $userID);
        return $userID;
    }

    /**
     * @covers \DCarbone\Camel\Node\ValueNode\UserID::nodeName
     * @uses \DCarbone\Camel\Node\ValueNode\UserID
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\ValueNode\UserID $userID
     */
    public function testCanGetNodeName(\DCarbone\Camel\Node\ValueNode\UserID $userID)
    {
        $name = $userID->nodeName();
        $this->assertInternalType('string', $name);
        $this->assertEquals('UserID', $name);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::getAllowableParents
     * @uses \DCarbone\Camel\Node\AbstractNode
     * @uses \DCarbone\Camel\Node\ValueNode\UserID
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\ValueNode\UserID $userID
     */
    public function testCanGetValidParents(\DCarbone\Camel\Node\ValueNode\UserID $userID)
    {
        $parents = $userID->getAllowableParents();

        $this->assertInternalType('array', $parents);
        $this->assertCount(1, $parents);
        $this->assertContains('Value', $parents);
    }

    /**
     * @covers \DCarbone\Camel\Node\ValueNode\UserID::nodeValue
     * @covers \DCarbone\Camel\Node\ValueNode\UserID::getNodeValue
     * @uses \DCarbone\Camel\Node\ValueNode\UserID
     * @depends testCanInitializeNode
     * @param \DCarbone\Camel\Node\ValueNode\UserID $userID
     */
    public function testCanSetNodeTextValue(\DCarbone\Camel\Node\ValueNode\UserID $userID)
    {
        $ret = $userID->nodeValue('TestValue');
        $this->assertSame($userID, $ret);
        $textValue = $userID->getNodeValue();
        $this->assertInternalType('string', $textValue);
        $this->assertEquals('TestValue', $textValue);
    }
}
 