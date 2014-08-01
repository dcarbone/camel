<?php

use DCarbone\Camel\Camel;

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
        new Camel(null);
    }

    /**
     * @covers \DCarbone\Camel\Camel::__construct
     * @uses \DCarbone\Camel\Camel
     * @return Camel
     */
    public function testObjectCanBeConstructedForValidConstructorArguments()
    {
        $camel = new Camel('GetListItems', array());
        $this->assertInstanceOf('DCarbone\\Camel\\Camel', $camel);
        return $camel;
    }

    /**
     * @covers \DCarbone\Camel\Camel::__toString
     * @depends testObjectCanBeConstructedForValidConstructorArguments
     * @param Camel $camel
     * @return string
     */
    public function testCanTypecastObjectToString(Camel $camel)
    {
        $string = (string)$camel;
        $this->assertTrue(is_string($string), 'Non-string value returned from "(string)$camel".  Saw "'.gettype($string).'"');
        return $string;
    }

    /**
     * @covers \DCarbone\Camel\Camel::getAsSXE
     * @covers \DCarbone\Camel\Camel::__toString
     * @depends testObjectCanBeConstructedForValidConstructorArguments
     * @param Camel $camel
     * @return \SimpleXMLElement
     */
    public function testCanGetSXEOfObject(Camel $camel)
    {
        $sxe = $camel->getAsSXE();
        $this->assertInstanceOf('SimpleXMLElement', $sxe);
        return $sxe;
    }
}