<?php

/**
 * Class DateRangesOverlapTest
 */
class DateRangesOverlapTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\AbstractComparisonOperatorNode::__construct
     * @covers \DCarbone\Camel\Node\ComparisonOperator\DateRangesOverlap::__construct
     * @return \DCarbone\Camel\Node\ComparisonOperator\DateRangesOverlap
     */
    public function testCanConstructDateRangesOverlapNode()
    {
        $node = new \DCarbone\Camel\Node\ComparisonOperator\DateRangesOverlap();
        $this->assertInstanceOf('\\DCarbone\\Camel\\Node\\ComparisonOperator\\DateRangesOverlap', $node);
        return $node;
    }

    /**
     * @covers \DCarbone\Camel\Node\ComparisonOperator\DateRangesOverlap::nodeName
     * @depends testCanConstructDateRangesOverlapNode
     * @param \DCarbone\Camel\Node\ComparisonOperator\DateRangesOverlap $dateRangesOverlap
     */
    public function testCanGetDateRangesOverlapNodeName(\DCarbone\Camel\Node\ComparisonOperator\DateRangesOverlap $dateRangesOverlap)
    {
        $name = $dateRangesOverlap->nodeName();
        $this->assertInternalType('string', $name);
        $this->assertEquals('DateRangesOverlap', $name);
    }
}
