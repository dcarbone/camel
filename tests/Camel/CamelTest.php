<?php

/**
 * Class CamelTest
 */
class CamelTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @uses \DCarbone\Camel\Camel
     * @return \DCarbone\Camel\Camel
     */
    public function testCanConstructCamel()
    {
        $camel = new \DCarbone\Camel\Camel();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Camel', $camel);

        return $camel;
    }

    /**
     * @covers \DCarbone\Camel\Hump\OrderBy::__construct
     * @covers \DCarbone\Camel\Camel::orderBy
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Hump\AbstractHump
     * @uses \DCarbone\Camel\Hump\OrderBy
     * @depends testCanConstructCamel
     * @param \DCarbone\Camel\Camel $camel
     */
    public function testCanCreateOrderByNode(\DCarbone\Camel\Camel $camel)
    {
        $orderBy = $camel->orderBy();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Hump\\OrderBy', $orderBy);
    }

    /**
     * @covers \DCarbone\Camel\Hump\GroupBy::__construct
     * @covers \DCarbone\Camel\Camel::groupBy
     * @uses \DCarbone\Camel\Hump\AbstractHump
     * @uses \DCarbone\Camel\Hump\GroupBy
     * @uses \DCarbone\Camel\Camel
     * @depends testCanConstructCamel
     * @param \DCarbone\Camel\Camel $camel
     */
    public function testCanCreateGroupByNode(\DCarbone\Camel\Camel $camel)
    {
        $groupBy = $camel->groupBy();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Hump\\GroupBy', $groupBy);
    }

    /**
     * @covers \DCarbone\Camel\Hump\Where::__construct
     * @covers \DCarbone\Camel\Camel::where
     * @uses \DCarbone\Camel\Hump\AbstractHump
     * @uses \DCarbone\Camel\Hump\Where
     * @uses \DCarbone\Camel\Camel
     * @depends testCanConstructCamel
     * @param \DCarbone\Camel\Camel $camel
     */
    public function testCanCreateWhereNode(\DCarbone\Camel\Camel $camel)
    {
        $where = $camel->where();

        $this->assertInstanceOf('\\DCarbone\\Camel\\Hump\\Where', $where);
    }

    /**
     * @covers \DCarbone\Camel\Camel::__toString
     * @covers \DCarbone\Camel\Hump\OrderBy::__toString
     * @covers \DCarbone\Camel\Hump\GroupBy::__toString
     * @covers \DCarbone\Camel\Hump\Where::__toString
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Hump\OrderBy
     * @uses \DCarbone\Camel\Hump\GroupBy
     * @depends testCanConstructCamel
     * @param \DCarbone\Camel\Camel $camel
     */
    public function testCanGetXMLStringViaTypecasting(\DCarbone\Camel\Camel $camel)
    {
        $xmlString = (string)$camel;

        $sxe = new \SimpleXMLElement($xmlString);

        $this->assertInstanceOf('\\SimpleXMLElement', $sxe);
        $this->assertFalse(libxml_get_last_error());

        $sxe = null;
    }
}
 