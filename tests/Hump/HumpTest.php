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
    public function testExceptionRaisedWhenConstructingHumpWithInvalidHumpTypeParameterType()
    {
        new \DCarbone\Camel\Parts\Hump(null);
    }

    /**
     * @covers \DCarbone\Camel\Parts\Hump::__construct
     * @uses \DCarbone\Camel\Parts\Hump
     * @expectedException \RuntimeException
     */
    public function testExceptionThrownWhenConstructingHumpWithInvalidHumpTypeParameterValue()
    {
        new \DCarbone\Camel\Parts\Hump('');
    }

    /**
     * @covers \DCarbone\Camel\Parts\Hump::__construct
     * @uses \DCarbone\Camel\Parts\Hump
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionRaisedWhenConstructingHumpWithInvalidValueParameterType()
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
        $this->assertEquals(1, count($hump->subHumps));
        $this->assertTrue($hump->subHumps->contains($subHump));
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
        $this->assertEquals(0, count($hump->subHumps));
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
        $this->assertEquals(0, count($hump->subHumps));
    }

    /**
     * @covers \DCarbone\Camel\Parts\Hump::__construct
     * @covers \DCarbone\Camel\Parts\Hump::__get
     * @covers \DCarbone\Camel\Parts\Hump::getAsSXE
     * @uses \DCarbone\Camel\Parts\Hump
     * @uses \DCarbone\CollectionPlus\BaseCollectionPlus
     */
    public function testCanGetHumpPropertiesWithMagicMethod()
    {
        $hump = new \DCarbone\Camel\Parts\Hump('Query', null, array('xmlns' => ''), true, array(
            new \DCarbone\Camel\Parts\Hump('SubHump')
        ));


        $type = $hump->type;
        $this->assertInternalType('string', $type);
        $this->assertEquals('Query', $type);

        $value = $hump->value;
        $this->assertInternalType('string', $value);
        $this->assertEquals('', $value);

        $attributes = $hump->attributes;
        $this->assertInternalType('array', $attributes);
        $this->assertCount(1, $attributes);
        $this->assertArrayHasKey('xmlns', $attributes);

        $wrapWithAny = $hump->wrapWithAny;
        $this->assertInternalType('bool', $wrapWithAny);
        $this->assertTrue($wrapWithAny);

        $subHumps = $hump->subHumps;
        $this->assertInstanceOf('\\DCarbone\\CollectionPlus\\BaseCollectionPlus', $subHumps);
        $this->assertCount(1, $subHumps);

        $sxe = $hump->sxe;
        $this->assertInstanceOf('\\SimpleXMLElement', $sxe);
    }

    /**
     * @covers \DCarbone\Camel\Parts\Hump::__get
     * @uses \DCarbone\Camel\Parts\Hump
     * @expectedException \OutOfBoundsException
     */
    public function testExceptionThrownWhenTryingToAccessInvalidProperty()
    {
        $hump = new \DCarbone\Camel\Parts\Hump('Query', null);

        $hump->sandwich;
    }

    /**
     * @covers \DCarbone\Camel\Parts\Hump::getValue
     * @uses \DCarbone\Camel\Parts\Hump
     */
    public function testCanGetValueOfHump()
    {
        $hump = new \DCarbone\Camel\Parts\Hump('Hump', 'humpy');

        $this->assertEquals('humpy', $hump->getValue());
    }
}