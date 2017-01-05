<?php
/**
 * This file is part of the vasildakov/nin project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Vasil Dakov <vasildakov@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT
 * @link https://github.com/vasildakov/nin GitHub
 */
namespace VasilDakov\Nino;

/**
 * Class Nino
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class Nino implements NinoInterface
{
    /**
     * /                      # Wraps regex
     * ^                      # Beginning of string
     * [A-CEGHJ-PR-TW-Z]{1}   # Match first letter, cannot be D, F, I, Q, U or V
     * [A-CEGHJ-NPR-TW-Z]{1}  # Match second letter, cannot be D, F, I, O, Q, U or V
     * [0-9]{6}               # Six digits
     * [A-D]{1}               # Match last letter can only be A, B, C or D
     * $                      # End of string
     * /i                     # Ending wrapper and i denotes can be upper or lower case
     * const REGEX = '/^[A-CEGHJ-PR-TW-Z]{1}[A-CEGHJ-NPR-TW-Z]{1}[0-9]{6}[A-D]{1}$/i';
     */

    const REGEX = '/^(?!BG)(?!GB)(?!NK)(?!KN)(?!TN)(?!NT)(?!ZZ)(?:[A-CEGHJ-PR-TW-Z][A-CEGHJ-NPR-TW-Z])(?:\s*\d\s*){6}([A-D]|\s)$/';
    //const REGEX = '/^(?!BG|GB|NK|KN|TN|NT|ZZ)[ABCEGHJ-PRSTW-Z][ABCEGHJ-NPRSTW-Z]\d{6}[A-D]$/';


    /**
     * @var string
     */
    private $value;


    /**
     * @param string $value
     */
    public function __construct($value)
    {
        $this->setValue($value);
    }


    /**
     * @param  NinInterface $other
     * @return boolean
     */
    public function equals(NinInterface $other)
    {
        #
    }


    /**
     * Returns true if the value is a valid UK NIN
     *
     * @param  string  $value
     * @return boolean
     */
    public static function isValid($value)
    {
        $value = \preg_replace('/(\s+)|(-)/', '', $value);

        if (!\preg_match(self::REGEX, $value)) {
            return false;
        }

        return true;
    }


    /**
     * @param string $value
     */
    private function setValue($value)
    {
        $value = \preg_replace('/(\s+)|(-)/', '', $value);

        if (!self::isValid($value)) {
            throw new \InvalidArgumentException("Invalid national insurance number");
        }

        $this->value = $value;
    }

    /**
     * Returns an object created from string
     *
     * @return Nin
     */
    public static function fromString($value)
    {
        return new static($value);
    }


    private function sanitize($value)
    {
        return \preg_replace('/(\s+)|(-)/', '', $value);
    }


    /**
     * @return string $value
     */
    public function getValue()
    {
        return $this->value;
    }
}
