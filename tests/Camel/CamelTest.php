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
    public function testExceptionIsRaisedWhenConstructingCamelWithInvalidNameParameterType()
    {
        new \DCarbone\Camel\Camel(null);
    }

    /**
     * @covers \DCarbone\Camel\Camel::__construct
     * @uses \DCarbone\Camel\Camel
     * @expectedException \RuntimeException
     */
    public function testExceptionRaisedWhenConstructingCamelWithInvalidNameParameterValue()
    {
        new \DCarbone\Camel\Camel('');
    }

    /**
     * @covers \DCarbone\Camel\Camel::__construct
     * @uses \DCarbone\Camel\Camel
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionRaisedWhenConstructingCamelWithInvalidHumpsParameterType()
    {
        new \DCarbone\Camel\Camel('Camel', 'sandwiches');
    }

    /**
     * @covers \DCarbone\Camel\Camel::__construct
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\CollectionPlus\BaseCollectionPlus
     */
    public function testCanConstructCamelWithValidNameAndNoHumps()
    {
        $camel = new \DCarbone\Camel\Camel('Camel');

        $this->assertInstanceOf('\\DCarbone\\Camel\\Camel', $camel);
    }

    /**
     * @covers \DCarbone\Camel\Camel::__construct
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Parts\Hump
     * @uses \DCarbone\CollectionPlus\BaseCollectionPlus
     */
    public function testCanConstructCamelWithValidNameAndArrayOfHumps()
    {
        $camel = new \DCarbone\Camel\Camel('Camel', array(
            new \DCarbone\Camel\Parts\Hump('Hump', 'humpy')
        ));

        $this->assertInstanceOf('\\DCarbone\\Camel\\Camel', $camel);
    }

    /**
     * @covers \DCarbone\Camel\Camel::__construct
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Parts\Hump
     * @uses \DCarbone\CollectionPlus\BaseCollectionPlus
     */
    public function testCanConstructCamelWithValidNameAndBaseCollectionPlusOfHumps()
    {
        $camel = new \DCarbone\Camel\Camel('Camel', new \DCarbone\CollectionPlus\BaseCollectionPlus(
            array(
                new \DCarbone\Camel\Parts\Hump('Hump', 'humpy')
            )));

        $this->assertInstanceOf('\\DCarbone\\Camel\\Camel', $camel);
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
        $camel = new \DCarbone\Camel\Camel('Camel', array(
            new \DCarbone\Camel\Parts\Hump('Hump', 'hump value')));

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
        $camel = new \DCarbone\Camel\Camel('Camel');

        $camel->sandwiches;
    }

    /**
     * @covers \DCarbone\Camel\Camel::getName
     * @uses \DCarbone\Camel\Camel
     */
    public function testCanGetNameOfCamel()
    {
        $camel = new \DCarbone\Camel\Camel('Camel');

        $name = $camel->getName();
        $this->assertInternalType('string', $name);
        $this->assertEquals('Camel', $name);
    }

    /**
     * @covers \DCarbone\Camel\Camel::__construct
     * @covers \DCarbone\Camel\Parts\Hump::__construct
     * @covers \DCarbone\Camel\Parts\Hump::__get
     * @covers \DCarbone\Camel\Camel::removeHump
     * @covers \DCarbone\Camel\Camel::__get
     * @uses \DCarbone\Camel\Camel
     * @uses \DCarbone\Camel\Parts\Hump
     * @uses \DCarbone\CollectionPlus\BaseCollectionPlus
     */
    public function testCanRemoveHumpFromCamelByHumpName()
    {
        $camel = new \DCarbone\Camel\Camel('Camel', array(
            new \DCarbone\Camel\Parts\Hump('Hump', 'hump value'),
            new \DCarbone\Camel\Parts\Hump('Hump2', 'hump 2 value')));

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
        $camel = new \DCarbone\Camel\Camel('Camel', array(
            new \DCarbone\Camel\Parts\Hump('Hump', 'hump value', null, true),
            new \DCarbone\Camel\Parts\Hump('Hump2', 'hump 2 value', null, false, array(
                new \DCarbone\Camel\Parts\Hump('SubHump', 'sub hump value')
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