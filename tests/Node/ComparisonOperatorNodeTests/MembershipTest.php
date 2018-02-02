<?php

/**
 * Class MembershipTest
 */
class MembershipTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode::__construct
     * @covers \DCarbone\Camel\Node\ComparisonOperator\Membership::__construct
     * @return \DCarbone\Camel\Node\ComparisonOperator\Membership
     */
    public function testCanConstructMembershipNode()
    {
        $node = new \DCarbone\Camel\Node\ComparisonOperator\Membership();
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Membership', $node);
        return $node;
    }

    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\Membership::nodeName
     * @depends testCanConstructMembershipNode
     * @param \DCarbone\Camel\Node\ComparisonOperator\Membership $membership
     */
    public function testCanGetMembershipNodeName(\DCarbone\Camel\Node\ComparisonOperator\Membership $membership)
    {
        $name = $membership->nodeName();
        $this->assertInternalType('string', $name);
        $this->assertEquals('Membership', $name);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::getAllowableAttributes
     * @depends testCanConstructMembershipNode
     * @param \DCarbone\Camel\Node\ComparisonOperator\Membership $membership
     */
    public function testHasCorrectBaseAllowableAttributes(\DCarbone\Camel\Node\ComparisonOperator\Membership $membership)
    {
        $allowableAttributes = $membership->getAllowableAttributes();
        $this->assertInternalType('array', $allowableAttributes);
        $this->assertCount(1, $allowableAttributes);
        $this->assertContains('Type', $allowableAttributes);
    }
}
