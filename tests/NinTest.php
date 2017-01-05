<?php
namespace VasilDakov\Tests;

use VasilDakov\Nin\NinInterface;
use VasilDakov\Nin\Nin;

class NinTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @covers \VasilDakov\Nin\Nin::__construct
     */
    public function itCanBeConstructedWithSanitizedString()
    {
        self::assertInstanceOf(NinInterface::class, new Nin('AA112233A'));
    }

    /**
     * @test
     * @covers \VasilDakov\Nin\Nin::__construct
     */
    public function itCanBeConstructedWithNonSanitizedString()
    {
        self::assertInstanceOf(NinInterface::class, new Nin('AA 11 22 33 A'));
    }

    /**
     * @test
     * @covers \VasilDakov\Nin\Nin::__construct
     */
    public function itCanBeCreatedFromSanitizedString()
    {
        self::assertInstanceOf(NinInterface::class, Nin::fromString('AB123456A'));
    }

    /**
     * @test
     * @covers \VasilDakov\Nin\Nin::__construct
     */
    public function itCanBeCreatedFromNonSanitizedString()
    {
        self::assertInstanceOf(NinInterface::class, Nin::fromString('AB 12 34 56 A'));
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
            ['BB 44 55 66 B', true],
            ['CC678900C', true],
            // invalid
            ['AA112233E', false],
            ['DA112233A', false],
            ['AO112233A', false],
        ];
    }
}
