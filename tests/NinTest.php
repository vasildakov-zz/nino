<?php
namespace VasilDakov\Tests;

use VasilDakov\Nin\NinInterface;
use VasilDakov\Nin\Nin;

class PostcodeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @covers \VasilDakov\Nin\Nin::__construct
     */
    public function itCanBeConstructed()
    {
        $nin = new Nin('AA112233A');

        self::assertInstanceOf(NinInterface::class, $nin);
    }


    /**
     * @test
     * @dataProvider ninProvider
     * @covers \VasilDakov\Nin\Nin::isValid
     */
    public function itCanValidateNin($string, $expected)
    {
        self::assertEquals($expected, Nin::isValid($string));
    }


    public function ninProvider()
    {
        return [
            // valid
            ['AA 112233 A', true],
            ['BB 445566 B', true],
            ['ZZ 678900 C', true],
            // invalid
            ['AA 112233 E', false],
            ['DA 112233 A', false],
            ['AO 112233 A', false],
        ];
    }
}