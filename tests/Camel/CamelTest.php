<?php

/**
 * Class CamelTest
 */
class CamelTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \DCarbone\Camel\Camel::init
     * @uses \DCarbone\Camel\Camel
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedWhenConstructingCamelWithInvalidNameParameterType()
    {
        \DCarbone\Camel\Camel::init(null);
    }

    /**
     * @covers \DCarbone\Camel\Camel::init
     * @uses \DCarbone\Camel\Camel
     * @expectedException \RuntimeException
     */
    public function testExceptionRaisedWhenConstructingCamelWithInvalidNameParameterValue()
    {
        \DCarbone\Camel\Camel::init('');
    }

    /**
     * @covers \DCarbone\Camel\Camel::init
     * @uses \DCarbone\Camel\Camel
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionRaisedWhenConstructingCamelWithInvalidHumpsParameterType()
    {
         \DCarbone\Camel\Camel::init('Camel', 'sandwiches');
    }

    /**
     * @covers \DCarbone\Camel\Camel::init
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\CollectionPlus\BaseCollectionPlus
     */
    public function testCanConstructCamelWithValidNameAndNoHumps()
    {
        $camel =  \DCarbone\Camel\Camel::init('Camel');

        $this->assertInstanceOf('\\DCarbone\\Camel\\Camel', $camel);
    }

    /**
     * @covers \DCarbone\Camel\Camel::init
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Parts\Hump
     * @uses \DCarbone\CollectionPlus\BaseCollectionPlus
     */
    public function testCanConstructCamelWithValidNameAndArrayOfHumps()
    {
        $camel =  \DCarbone\Camel\Camel::init('Camel', array(
            \DCarbone\Camel\Parts\Hump::init('Hump', 'humpy')
        ));

        $this->assertInstanceOf('\\DCarbone\\Camel\\Camel', $camel);
    }

    /**
     * @covers \DCarbone\Camel\Camel::init
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Parts\Hump
     * @uses \DCarbone\CollectionPlus\BaseCollectionPlus
     */
    public function testCanConstructCamelWithValidNameAndBaseCollectionPlusOfHumps()
    {
        $camel =  \DCarbone\Camel\Camel::init('Camel', new \DCarbone\CollectionPlus\BaseCollectionPlus(
            array(
                \DCarbone\Camel\Parts\Hump::init('Hump', 'humpy')
            )));

        $this->assertInstanceOf('\\DCarbone\\Camel\\Camel', $camel);
    }

    /**
     * @covers \DCarbone\Camel\Camel::init
     * @uses \DCarbone\Camel\Camel
     * @return \DCarbone\Camel\Camel
     */
    public function testObjectCanBeConstructedWithValidConstructorArguments()
    {
        $camel =  \DCarbone\Camel\Camel::init('GetListItems', array());
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
     * @covers \DCarbone\Camel\Camel::addHump
     * @covers \DCarbone\Camel\Parts\Hump::init
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Parts\Hump
     * @depends testObjectCanBeConstructedWithValidConstructorArguments
     * @param \DCarbone\Camel\Camel $camel
     */
    public function testCanAppendHump(\DCarbone\Camel\Camel $camel)
    {
        $hump = \DCarbone\Camel\Parts\Hump::init('listName', 'My Great List');
        $camel->addHump($hump);

        $this->assertEquals(1, count($camel->humps));
        $this->assertTrue($camel->humps->contains($hump));
    }

    /**
     * @covers \DCarbone\Camel\Camel::__get
     * @covers \DCarbone\Camel\Camel::getAsSXE
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\CollectionPlus\BaseCollectionPlus
     */
    public function testCanGetCamelPropertiesWithMagicMethod()
    {
        $camel =  \DCarbone\Camel\Camel::init('Camel', array(
            \DCarbone\Camel\Parts\Hump::init('Hump', 'hump value')));

        $name = $camel->name;
        $this->assertInternalType('string', $name);
        $this->assertEquals('Camel', $name);

        $humps = $camel->humps;
        $this->assertInstanceOf('\\DCarbone\\CollectionPlus\\BaseCollectionPlus', $humps);
        $this->assertCount(1, $humps);

        $sxe = $camel->sxe;
        $this->assertInstanceOf('\\SimpleXMLElement', $sxe);
    }

    /**
     * @covers \DCarbone\Camel\Camel::__get
     * @uses \DCarbone\Camel\Camel
     * @expectedException \OutOfBoundsException
     */
    public function testExceptionThrownWhenTryingToAccessInvalidCamelProperty()
    {
        $camel =  \DCarbone\Camel\Camel::init('Camel');

        $camel->{'sandwiches'};
    }

    /**
     * @covers \DCarbone\Camel\Camel::getName
     * @uses \DCarbone\Camel\Camel
     */
    public function testCanGetNameOfCamel()
    {
        $camel =  \DCarbone\Camel\Camel::init('Camel');

        $name = $camel->getName();
        $this->assertInternalType('string', $name);
        $this->assertEquals('Camel', $name);
    }

    /**
     * @covers \DCarbone\Camel\Camel::init
     * @covers \DCarbone\Camel\Parts\Hump::init
     * @covers \DCarbone\Camel\Parts\Hump::__get
     * @covers \DCarbone\Camel\Camel::removeHump
     * @covers \DCarbone\Camel\Camel::__get
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Parts\Hump
     * @uses \DCarbone\CollectionPlus\BaseCollectionPlus
     */
    public function testCanRemoveHumpFromCamelByHumpName()
    {
        $camel =  \DCarbone\Camel\Camel::init('Camel', array(
            \DCarbone\Camel\Parts\Hump::init('Hump', 'hump value'),
            \DCarbone\Camel\Parts\Hump::init('Hump2', 'hump 2 value')));

        $humps = $camel->humps;
        $this->assertInstanceOf('\\DCarbone\\CollectionPlus\\BaseCollectionPlus', $humps);
        $this->assertCount(2, $humps);

        $camel->removeHump('Hump');

        $humps = $camel->humps;
        $this->assertInstanceOf('\\DCarbone\\CollectionPlus\\BaseCollectionPlus', $humps);
        $this->assertCount(1, $humps);

        /** @var \DCarbone\Camel\Parts\Hump $hump */
        $hump = $humps->first();
        $this->assertInstanceOf('\\DCarbone\\Camel\\Parts\\Hump', $hump);
        $this->assertEquals('Hump2', $hump->type);
    }

    /**
     * @covers \DCarbone\Camel\Camel::toSoapClientArgumentArray
     * @covers \DCarbone\Camel\Camel::getAsSXE
     * @covers \DCarbone\Camel\Camel::parseXML
     * @covers \DCarbone\Camel\Camel::__toString
     * @covers \DCarbone\Camel\Parts\Hump::getAsSXE
     * @covers \DCarbone\Camel\Parts\Hump::__toString
     */
    public function testCanGetSOAPClientArgumentArray()
    {
        $camel =  \DCarbone\Camel\Camel::init('Camel', array(
            \DCarbone\Camel\Parts\Hump::init('Hump', 'hump value', null, true),
            \DCarbone\Camel\Parts\Hump::init('Hump2', 'hump 2 value', null, false, array(
                \DCarbone\Camel\Parts\Hump::init('SubHump', 'sub hump value')
            ))));

        $array = $camel->toSoapClientArgumentArray();
        $this->assertInternalType('array', $array);

        $this->assertCount(1, $array);
        $this->assertArrayHasKey('Camel', $array);

        $this->assertArrayHasKey('any', $array['Camel']);
        $this->assertArrayHasKey('Hump2', $array['Camel']);

        $this->assertContains('<Hump>hump value</Hump>', $array['Camel']['any']);
    }
}