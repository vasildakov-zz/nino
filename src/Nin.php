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
namespace VasilDakov\Nin;

/**
 * Class Nin
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class Nin implements NinInterface
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
     */
    const REGEX = '/^[A-CEGHJ-PR-TW-Z]{1}[A-CEGHJ-NPR-TW-Z]{1}[0-9]{6}[A-D]{1}$/i';

    /**
     * @var string
     */
    private $value;


    /**
     * @param string $value
     */
    public function __construct($value)
    {
        $value = \preg_replace('/(\s+)|(-)/', '', $value);

        if (!self::isValid($value)) {
            throw new \InvalidArgumentException("Invalid national insurance number");
        }

        $this->value = $value;
    }


    /**
     * Returns true if the value is a valid UK NIN
     *
     * @param  string  $value
     * @return boolean
     */
    public static function isValid($value)
    {
        if (!\preg_match(self::REGEX, $value)) {
            return false;
        }

        return true;
    }

    /**
     * @return string $value
     */
    public function getValue()
    {
        return $this->value;
    }
}
