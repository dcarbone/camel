<?php

use \DCarbone\Camel\Parts\Hump;

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
    public function testExceptionIsRaisedForInvalidConstructorArguments()
    {
        new Hump(null);
    }

    /**
     * @covers \DCarbone\Camel\Parts\Hump::__construct
     * @uses \DCarbone\Camel\Parts\Hump
     * @return Hump
     */
    public function testObjectCanBeConstructedForValidConstructorArguments()
    {
        $hump = new Hump('Query', array('xmlns' => ''));
        $this->assertInstanceOf('DCarbone\\Camel\\Parts\\Hump', $hump);
        return $hump;
    }

    /**
     * @covers \DCarbone\Camel\Parts\Hump::__toString
     * @depends testObjectCanBeConstructedForValidConstructorArguments
     * @param Hump $hump
     * @return string
     */
    public function testCanTypecastObjectToString(Hump $hump)
    {
        $string = (string)$hump;
        $this->assertTrue(is_string($string), 'Non-string value returned from "(string)$hump".  Saw "'.gettype($string).'"');
        return $string;
    }

    /**
     * @covers \DCarbone\Camel\Parts\Hump::getAsSXE
     * @covers \DCarbone\Camel\Parts\Hump::__toString
     * @uses \DCarbone\Camel\Parts\Hump
     * @uses \SimpleXMLElement
     * @depends testObjectCanBeConstructedForValidConstructorArguments
     * @param Hump $hump
     * @return \SimpleXMLElement
     */
    public function testCanGetSXEOfObject(Hump $hump)
    {
        $sxe = $hump->getAsSXE();
        $this->assertInstanceOf('SimpleXMLElement', $sxe);
        return $sxe;
    }

    /**
     * @covers \DCarbone\Camel\Parts\Hump::__construct
     * @covers \DCarbone\Camel\Parts\Hump::addSubHump
     * @uses \DCarbone\Camle\Parts\Hump
     * @depends testObjectCanBeConstructedForValidConstructorArguments
     * @param Hump $hump
     * @return array
     */
    public function testCanAppendSubHump(Hump $hump)
    {
        $subHump = new Hump('query', '', array(), true);
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
        $hump = new Hump('Query', '', array('xmlns' => ''));
        $subHump = new Hump('query', '', array(), true);
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
        $hump = new Hump('Query', '', array('xmlns' => ''));
        $subHump = new Hump('query', '', array(), true);
        $hump->addSubHump($subHump);
        $hump->removeSubHump($subHump);
        $this->assertEquals(0, count($hump));
    }
}
