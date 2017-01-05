<?php
/**
 * This file is part of the vasildakov/nino project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Vasil Dakov <vasildakov@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT
 * @link https://github.com/vasildakov/nino GitHub
 */
namespace VasilDakov\Nino;

/**
 * Interface NinoInterface
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface NinoInterface
{
    public static function isValid($value);

    public static function fromString($value);

    public function equals(NinoInterface $other);

    public function getValue();
}
