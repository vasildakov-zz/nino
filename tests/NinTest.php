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
     * @covers \VasilDakov\Nin\Nin::__construct
     */
    public function itCanBeCreatedFromString()
    {
        $nin = Nin::fromString('AA112233A');
        self::assertInstanceOf(NinInterface::class, $nin);
    }

    /**
     * @test
     * @dataProvider sanitizedNinProvider
     * @covers \VasilDakov\Nin\Nin::isValid
     */
    public function itCanValidateNin($string, $expected)
    {
        self::assertEquals($expected, Nin::isValid($string));
    }


    public function sanitizedNinProvider()
    {
        return [
            // valid
            ['AA112233A', true],
            ['BB445566B', true],
            ['ZZ678900C', true],
            // invalid
            ['AA112233E', false],
            ['DA112233A', false],
            ['AO112233A', false],
        ];
    }
}