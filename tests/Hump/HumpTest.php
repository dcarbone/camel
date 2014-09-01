<?php

/**
 * Class HumpTest
 */
class HumpTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \DCarbone\Camel\Parts\Hump::__construct
     * @uses \DCarbone\Camel\Parts\Hump
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionRaisedWhenConstructingWithInvalidHumpTypeParameter()
    {
        new \DCarbone\Camel\Parts\Hump(null);
    }

    /**
     * @covers \DCarbone\Camel\Parts\Hump::__construct
     * @uses \DCarbone\Camel\Parts\Hump
     * @expectedException \RuntimeException
     */
    public function testExceptionRaisedWhenConstructingWithInvalidValueParameter()
    {
        new \DCarbone\Camel\Parts\Hump('Hump', array());
    }

    /**
     * @covers \DCarbone\Camel\Parts\Hump::__construct
     * @uses \DCarbone\Camel\Parts\Hump
     * @return \DCarbone\Camel\Parts\Hump
     */
    public function testObjectCanBeConstructedWithValidConstructorArguments()
    {
        $hump = new \DCarbone\Camel\Parts\Hump('Query', '', array('xmlns' => ''));
        $this->assertInstanceOf('DCarbone\\Camel\\Parts\\Hump', $hump);
        return $hump;
    }

    /**
     * @covers \DCarbone\Camel\Parts\Hump::getType
     * @uses \DCarbone\Camel\Parts\Hump
     * @depends testObjectCanBeConstructedWithValidConstructorArguments
     * @param \DCarbone\Camel\Parts\Hump $hump
     */
    public function testCanGetTypeOfHump(\DCarbone\Camel\Parts\Hump $hump)
    {
        $type = $hump->getType();
        $this->assertEquals('Query', $type);
    }

    /**
     * @covers \DCarbone\Camel\Parts\Hump::getAttributes
     * @uses \DCarbone\Camel\Parts\Hump
     * @depends testObjectCanBeConstructedWithValidConstructorArguments
     * @param \DCarbone\Camel\Parts\Hump $hump
     */
    public function testCanGetAttributesOfHump(\DCarbone\Camel\Parts\Hump $hump)
    {
        $attributes = $hump->getAttributes();
        $this->assertInternalType('array', $attributes);
        $this->assertArrayHasKey('xmlns', $attributes);
    }

    /**
     * @covers \DCarbone\Camel\Parts\Hump::__toString
     * @uses \DCarbone\Camel\Parts\Hump
     */
    public function testCanTypecastHumpToStringWithNoValueOrAttributes()
    {
        $hump = new \DCarbone\Camel\Parts\Hump('Hump');

        $string = (string)$hump;
        $this->assertInternalType('string', $string);
        $this->assertEquals('<Hump />', $string);
    }

    /**
     * @covers \DCarbone\Camel\Parts\Hump::__toString
     * @uses \DCarbone\Camel\Parts\Hump
     */
    public function testCanTypecastHumpToStringWithValueAndNoAttributes()
    {
        $hump = new \DCarbone\Camel\Parts\Hump('Hump', 'Humpy');

        $string = (string)$hump;
        $this->assertInternalType('string', $string);
        $this->assertEquals('<Hump>Humpy</Hump>', $string);
    }

    /**
     * @covers \DCarbone\Camel\Parts\Hump::getAsSXE
     * @covers \DCarbone\Camel\Parts\Hump::__toString
     * @uses \DCarbone\Camel\Parts\Hump
     * @uses \SimpleXMLElement
     * @depends testObjectCanBeConstructedWithValidConstructorArguments
     * @param \DCarbone\Camel\Parts\Hump $hump
     * @return \SimpleXMLElement
     */
    public function testCanGetSXEOfObject(\DCarbone\Camel\Parts\Hump $hump)
    {
        $sxe = $hump->getAsSXE();
        $this->assertInstanceOf('SimpleXMLElement', $sxe);
        return $sxe;
    }

    /**
     * @covers \DCarbone\Camel\Parts\Hump::__toString
     * @covers \DCarbone\Camel\Parts\Hump::wrapWithAny
     * @uses \DCarbone\Camel\Parts\Hump
     */
    public function testCanSetWrapWithAnyAfterConstruction()
    {
        $hump = new \DCarbone\Camel\Parts\Hump('Hump');
        $this->assertInstanceOf('\\DCarbone\\Camel\\Parts\\Hump', $hump);

        $xml = (string)$hump;

        $this->assertInternalType('string', $xml);
        $this->assertEquals('<Hump />', $xml);

        $hump->wrapWithAny(true);

        $xml = (string)$hump;

        $this->assertInternalType('string', $xml);
        $this->assertEquals('<any><Hump /></any>', $xml);
    }

    /**
     * @covers \DCarbone\Camel\Parts\Hump::__construct
     * @covers \DCarbone\Camel\Parts\Hump::addSubHump
     * @uses \DCarbone\Camel\Parts\Hump
     * @depends testObjectCanBeConstructedWithValidConstructorArguments
     * @param \DCarbone\Camel\Parts\Hump $hump
     * @return array
     */
    public function testCanAppendSubHump(\DCarbone\Camel\Parts\Hump $hump)
    {
        $subHump = new \DCarbone\Camel\Parts\Hump('query', '', array(), true);
        $hump->addSubHump($subHump);
        $this->assertEquals(1, count($hump));
        $this->assertTrue($hump->contains($subHump));
        return array($hump, $subHump);
    }

    /**
     * @covers \DCarbone\Camel\Parts\Hump::removeSubHump
     * @covers \DCarbone\Camel\Parts\Hump::__construct
     * @uses \DCarbone\Camel\Parts\Hump
     */
    public function testCanRemoveSubHumpViaSubHumpTypeString()
    {
        $hump = new \DCarbone\Camel\Parts\Hump('Query', '', array('xmlns' => ''));
        $subHump = new \DCarbone\Camel\Parts\Hump('query', '', array(), true);
        $hump->addSubHump($subHump);
        $hump->removeSubHump($subHump->getType());
        $this->assertEquals(0, count($hump));
    }

    /**
     * @covers \DCarbone\Camel\Parts\Hump::removeSubHump
     * @covers \DCarbone\Camel\Parts\Hump::__construct
     * @uses \DCarbone\Camel\Parts\Hump
     */
    public function testCanRemoveSubHumpViaSubHumpObject()
    {
        $hump = new \DCarbone\Camel\Parts\Hump('Query', '', array('xmlns' => ''));
        $subHump = new \DCarbone\Camel\Parts\Hump('query', '', array(), true);
        $hump->addSubHump($subHump);
        $hump->removeSubHump($subHump);
        $this->assertEquals(0, count($hump));
    }
}
