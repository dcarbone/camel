<?php

/**
 * Class CamelTest
 */
class CamelTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \DCarbone\Camel\Camel::__construct
     * @uses \DCarbone\Camel\Camel
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForInvalidConstructorArguments()
    {
        new \DCarbone\Camel\Camel(null);
    }

    /**
     * @covers \DCarbone\Camel\Camel::__construct
     * @uses \DCarbone\Camel\Camel
     * @return \DCarbone\Camel\Camel
     */
    public function testObjectCanBeConstructedWithValidConstructorArguments()
    {
        $camel = new \DCarbone\Camel\Camel('GetListItems', array());
        $this->assertInstanceOf('DCarbone\\Camel\\Camel', $camel);
        return $camel;
    }

    /**
     * @covers \DCarbone\Camel\Camel::__toString
     * @uses \DCarbone\Camel\Camel
     * @depends testObjectCanBeConstructedWithValidConstructorArguments
     * @param \DCarbone\Camel\Camel $camel
     * @return string
     */
    public function testCanTypecastObjectToString(\DCarbone\Camel\Camel $camel)
    {
        $string = (string)$camel;
        $this->assertTrue(is_string($string), 'Non-string value returned from "(string)$camel".  Saw "'.gettype($string).'"');
        return $string;
    }

    /**
     * @covers \DCarbone\Camel\Camel::getAsSXE
     * @covers \DCarbone\Camel\Camel::__toString
     * @uses \DCarbone\Camel\Camel
     * @uses \SimpleXMLElement
     * @depends testObjectCanBeConstructedWithValidConstructorArguments
     * @param \DCarbone\Camel\Camel $camel
     * @return \SimpleXMLElement
     */
    public function testCanGetSXEOfObject(\DCarbone\Camel\Camel $camel)
    {
        $sxe = $camel->getAsSXE();
        $this->assertInstanceOf('SimpleXMLElement', $sxe);
        return $sxe;
    }

    /**
     * @covers \DCarbone\Camel\Camel::__toArray
     * @covers \DCarbone\Camel\Camel::getAsSXE
     * @covers \DCarbone\Camel\Camel::__toString
     * @uses \DCarbone\Camel\Camel
     * @uses \SimpleXMLElement
     * @depends testObjectCanBeConstructedWithValidConstructorArguments
     * @param \DCarbone\Camel\Camel $camel
     * @return array
     */
    public function testCanGetArrayOfObject(\DCarbone\Camel\Camel $camel)
    {
        $array = $camel->__toArray();

        $this->assertInternalType('array', $array);

        return $array;
    }

    /**
     * @covers \DCarbone\Camel\Camel::newHump
     * @covers \DCarbone\Camel\Parts\Hump::__construct
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Parts\Hump
     * @depends testObjectCanBeConstructedWithValidConstructorArguments
     * @param \DCarbone\Camel\Camel $camel
     */
    public function testCanCreateNewHump(\DCarbone\Camel\Camel $camel)
    {
        $hump = $camel->newHump('listName', 'My Great List');
        $this->assertInstanceOf('DCarbone\\Camel\\Parts\\Hump', $hump);
    }

    /**
     * @covers \DCarbone\Camel\Camel::addHump
     * @covers \DCarbone\Camel\Camel::newHump
     * @covers \DCarbone\Camel\Parts\Hump::__construct
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Parts\Hump
     * @depends testObjectCanBeConstructedWithValidConstructorArguments
     * @param \DCarbone\Camel\Camel $camel
     */
    public function testCanAppendHump(\DCarbone\Camel\Camel $camel)
    {
        $hump = $camel->newHump('listName', 'My Great List');
        $camel->addHump($hump);

        $this->assertEquals(1, count($camel));
        $this->assertTrue($camel->contains($hump));
    }
}