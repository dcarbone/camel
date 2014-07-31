<?php

use DCarbone\Camel\Camel;

/**
 * Class CamelTest
 */
class CamelTest extends PHPUnit_Framework_TestCase {

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
     * @covers \DCarbone\Camel\Camel
     * @return Camel
     */
    public function testObjectCanBeConstructedForValidConstructorArguments()
    {
        $camel = new Camel('GetListItems', array());
        $this->assertInstanceOf('DCarbone\\Camel\\Camel', $camel);
        return $camel;
    }

    /**
     * @param Camel $camel
     * @covers \DCarbone\Camel\Camel::getName
     * @depends testObjectCanBeConstructedForValidConstructorArguments
     */
    public function testNameCanBeRetrieved(Camel $camel)
    {
        $this->assertEquals('GetListItems', $camel->getName());
    }
}
