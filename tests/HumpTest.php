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
     * @depends testObjectCanBeConstructedForValidConstructorArguments
     * @param Hump $hump
     * @return array
     */
    public function testCanAppendSubHump(Hump $hump)
    {
        $subHump = new Hump('query', '', array(), true);
        $hump->addSubHump($subHump);
        $this->assertEquals(1, count($hump));

        return array($hump, $subHump);
    }

    /**
     * @covers \DCarbone\Camel\Parts\Hump::removeSubHump
     * @depends testCanAppendSubHump
     * @param array $humps
     */
    public function testCanRemoveSubHumpViaSubHumpTypeString(array $humps)
    {
        $humps[0]->removeSubHump($humps[1]->getType());
        $this->assertEquals(0, count($humps[0]));
    }

    /**
     * @covers \DCarbone\Camel\Parts\Hump::removeSubHump
     * @depends testCanAppendSubHump
     * @param array $humps
     */
    public function testCanRemoveSubHumpViaSubHumpObject(array $humps)
    {
        $humps[0]->removeSubHump($humps[1]);
        $this->assertEquals(0, count($humps[0]));
    }
}
