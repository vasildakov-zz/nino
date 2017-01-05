<?php
namespace VasilDakov\Tests;

use VasilDakov\Nino\NinoInterface;
use VasilDakov\Nino\Nino;

class NinoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @covers \VasilDakov\Nino\Nino::__construct
     */
    public function itCanBeConstructedWithSanitizedString()
    {
        self::assertInstanceOf(NinoInterface::class, new Nino('AA112233A'));
    }

    /**
     * @test
     * @covers \VasilDakov\Nino\Nino::__construct
     */
    public function itCanBeConstructedWithNonSanitizedString()
    {
        $nino = new Nino('AA 11 22 33 A');

        self::assertInstanceOf(NinoInterface::class, $nino);

        self::assertEquals('AA112233A', $nino->getValue());
    }

    /**
     * @test
     * @covers \VasilDakov\Nino\Nino::__construct
     */
    public function itCanBeCreatedFromSanitizedString()
    {
        $nino = Nino::fromString('AB123456A');

        self::assertInstanceOf(NinoInterface::class, $nino);
    }


    /**
     * @test
     * @covers \VasilDakov\Nino\Nino::__construct
     */
    public function itCanBeCreatedFromNonSanitizedString()
    {
        $nino = Nino::fromString('AB 12 34 56 A');

        self::assertInstanceOf(NinoInterface::class, $nino);

        self::assertEquals('AB123456A', $nino->getValue());
    }


    /**
     * @test
     * @dataProvider sanitizedNinoProvider
     * @covers \VasilDakov\Nino\Nino::isValid
     */
    public function itCanValidateNin($string, $expected)
    {
        self::assertEquals($expected, Nino::isValid($string));
    }


    /**
     * Returns an array with sanitized ni
     *
     * @return array
     */
    public function sanitizedNinoProvider()
    {
        return [
            // valid
            ['AA112233A', true],
            ['AA445566A', true],
            ['CC678900C', true],
            // invalid
            ['AA112233E', false],
            ['DA112233A', false],
            ['AO112233A', false],
            // real
            ['ST648120A', true],
        ];
    }
}
