<?php

/**
 * Class ContainsTest
 */
class ContainsTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode::__construct
     * @covers \DCarbone\Camel\Node\ComparisonOperator\Contains::__construct
     * @return \DCarbone\Camel\Node\ComparisonOperator\Contains
     */
    public function testCanConstructContainsNode()
    {
        $node = new \DCarbone\Camel\Node\ComparisonOperator\Contains();
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\Contains', $node);
        return $node;
    }

    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\Contains::nodeName
     * @depends testCanConstructContainsNode
     * @param \DCarbone\Camel\Node\ComparisonOperator\Contains $contains
     */
    public function testCanGetContainsNodeName(\DCarbone\Camel\Node\ComparisonOperator\Contains $contains)
    {
        $name = $contains->nodeName();
        $this->assertInternalType('string', $name);
        $this->assertEquals('Contains', $name);
    }

    /**
     * @covers \DCarbone\Camel\Node\AbstractNode::getAllowableParents
     * @depends testCanConstructContainsNode
     * @param \DCarbone\Camel\Node\ComparisonOperator\Contains $contains
     */
    public function testHasCorrectAllowableParents(\DCarbone\Camel\Node\ComparisonOperator\Contains $contains)
    {
        $allowableParents = $contains->getAllowableParents();

        $this->assertInternalType('array', $allowableParents);
        $this->assertCount(5, $allowableParents);
        $this->assertContains('Expr1', $allowableParents);
        $this->assertContains('Expr2', $allowableParents);
    }
}
